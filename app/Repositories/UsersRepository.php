<?php

namespace App\Repositories;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\DB;
use Lfalmeida\Lbase\Exceptions\RepositoryException;
use Lfalmeida\Lbase\Models\Role;
use App\Exceptions\ValidationException;
use Lfalmeida\Lbase\Repositories\Repository as BaseRepository;
use Mockery\CountValidator\Exception;

/**
 * Class UsersRepository
 *
 * @package App\Repositories
 */
class UsersRepository extends BaseRepository
{
    /**
     * Define quais relações devem ser carregados ao instanciar um model
     *
     * @var array
     */
    protected $relationships = ['roles', 'profilePicture', 'city'];

    /**
     * Define qual coluna deve ser usada na ordenação de resultados
     *
     * @var string
     */
    protected $defaultOrderColumn = 'name';

    /**
     * Retorna qual é o model que este repositório gerencia
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\User';
    }

    /**
     * Cria um registro
     *
     * @param array $data Colunas e valores para serem salvos
     *
     * @return mixed
     * @throws ApiException
     * @throws ValidationException
     */
    public function create(array $data)
    {
        $model = $this->makeModel();
        $model->fill($data);

        $wasSaved = $model->save();

        if ($wasSaved) {
            $id = (int)$model->id;

            if (isset($data['roles'])) {
                $model->roles()->sync($data['roles']);
            }


            return $this->find($id);
        }

        $errorMessage = "Não foi possível salvar.";

        if (method_exists($model, 'isValid')) {
            $exception = new ValidationException();
            $exception->setMessages($model->getValidationErrors()->all());

            throw $exception;
        }
        throw new ApiException($errorMessage);

    }


    /**
     * Atualiza um model de acordo com id fornecido e as propriedades informadas
     *
     * @param integer $id
     * @param array $data Array mapeando as colunas e valores a serem atualizados
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function update($id, array $data)
    {
        $model = $this->find($id);

        if (!$model) {
            throw new RepositoryException("O item não solicitado não existe.");
        }

        $model->fill($data);

        $model->update();

        if (isset($data['roles'])) {
            $roles = $this->processRolesParam($data['roles']);
            $model->roles()->sync($roles);
        }

        return $this->find($id);

    }


    /**
     * Atribui Roles para um usuário
     *
     * @param $userId int Identificador do usuário que receberá o cargo
     * @param $roles  mixed Pode ser um id de cargo ou um array de id's de cargo
     *
     * @return mixed
     */
    public function attachRoles($userId, $roles)
    {
        try {
            $user = $this->detachRoles($userId, $roles);
            $user->roles()->attach($this->processRolesParam($roles));
        } catch (Exception $e) {
            throw $e;
        }
        return $this->model->with('roles')->find($userId);
    }

    /**
     * Remove um ou mais cargos de um usuário.
     *
     * @param $userId int Identificador do usuário que receberá o cargo
     * @param $roles  mixed Pode ser um id de cargo ou um array de id's de cargo
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function detachRoles($userId, $roles)
    {
        $user = $this->model->with('roles')->find($userId);

        if (!$user) {
            throw new Exception('Usuário não encontrado.');
        }

        try {
            $roles = !is_array($roles) ? explode(',', $roles) : $roles;
            $rolesToAttach = $this->processRolesParam($roles);
        } catch (Exception $e) {
            throw $e;
        }

        $user->roles()->detach($rolesToAttach);

        return $this->model->with('roles')->find($userId);
    }

    /**
     * @param $roles
     *
     * @return array
     * @throws \Exception
     */
    private function processRolesParam($roles)
    {
        $rolesToAttach = [];

        if (is_array($roles)) {
            $roleIds = $roles;
            foreach ($roleIds as $roleId) {

                if (!$roleId) {
                    continue;
                }

                $role = $this->getRoleById($roleId);

                $rolesToAttach[] = $role->id;
            }
        } elseif (is_numeric($roles)) {
            $role = $this->getRoleById($roles);
            $rolesToAttach[] = $role->id;
        }

        return $rolesToAttach;
    }

    /**
     * Recebe um id de cargo e retorna um objeto cargo.
     * No caso do cargo não ser encontrado lança uma exceção
     *
     * @param $roleId
     *
     * @return mixed
     * @throws \Exception
     */
    private function getRoleById($roleId)
    {
        if (!is_numeric($roleId)) {
            throw new \Exception(sprintf('Informe o id numérico do cargo.', $roleId));
        }

        $role = Role::find($roleId);

        if (!$role) {
            throw new \Exception(sprintf('Cargo id %s não encontrado.', $role));
        }

        return $role;
    }


}