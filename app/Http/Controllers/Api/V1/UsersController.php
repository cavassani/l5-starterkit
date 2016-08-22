<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\UsersRepository as Repository;
use Illuminate\Http\Request;
use Lfalmeida\Lbase\Controllers\ApiBaseController;
use Lfalmeida\Lbase\Utils\Uploader;
use Response;

class UsersController extends ApiBaseController
{
    /**
     * UsersController constructor.
     *
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }



    /**
     * Cria um usuário
     *
     *
     *
     * @SWG\Post(path="/users",
     *     tags={"Users"},
     *     summary="Criar usuário",
     *     description="Cria um registro de usuário.",
     *     operationId="createUser",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Parameter(
     *          type="object",
     *          in="body",
     *          name="User",
     *          description="Objeto usuário que será salvo",
     *          @SWG\Schema(ref="#/definitions/User")
     *     ),
     *     @SWG\Response(response="default", description="successful operation")
     * )

     *
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     *
     */
    public function store(Request $request)
    {
        $data = $request->except(['profilePicture']);
        $uploader = new Uploader($subfolder = 'users/profile/');
        $inputFiles = $request->file('profilePicture');
        $uploadedFiles = [];

        try {

            if ($inputFiles) {
                $uploader->handle($inputFiles);
                $uploadedFiles = $uploader->getFileList();
                $data['profilePicture'] = isset($uploadedFiles[0]->url) ? $uploadedFiles[0]->url : null;
            }

            $response = $this->repository->create($data);

        } catch (\Exception $e) {
            if (isset($uploadedFiles[0]->filePath)) {
                $uploader->removeFile($uploadedFiles[0]->filePath);
            }
            throw $e;
        }

        return Response::apiResponse([
            'data' => $response
        ]);
    }


    /**
     * Atualiza o cadastro de um usuário
     *
     *
     *
     * @SWG\Put(path="/users/{id}",
     *     tags={"Users"},
     *     summary="Atualizar usuário",
     *     description="Atualiza o registro de um usuário.",
     *     operationId="updateUser",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Parameter(
     *         in="path",
     *         name="id",
     *         type="integer",
     *         description="id do usuário",
     *         required=true
     *     ),
     *     @SWG\Parameter(
     *          type="object",
     *          in="body",
     *          name="User",
     *          description="Objeto usuário que será salvo",
     *          @SWG\Schema(ref="#/definitions/User")
     *     ),
     *     @SWG\Response(response="default", description="successful operation")
     * )

     *
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     *
     */


    /**
     * Listar usuários
     *
     *
     * @SWG\Get(path="/users",
     *   tags={"Users"},
     *   summary="Listar usuários",
     *   description="Retorna uma lista de usuários com paginação",
     *   operationId="listUsers",
     *   produces={"application/json"},
     *   consumes={"application/json"},
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */

    /**
     * Obter um usuário através do id
     *
     *
     * @SWG\Get(path="/users/{id}",
     *   tags={"Users"},
     *   summary="Obter um usuário",
     *   description="Retorna um usuário a pertir do id informado",
     *   operationId="getUser",
     *   produces={"application/json"},
     *   consumes={"application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="id",
     *     type="integer",
     *     description="id do usuário para consulta",
     *     required=true
     *   ),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */


    /**
     * Método Update
     *
     * @apiDescription    Atualiza os dados de um usuário. O identificador do usuário deve ser passado na url no local
     *                    indicado <strong>:id</strong>
     * @apiUse            HeaderToken
     * @api               {put} /api/v1/users/:id Update
     * @apiVersion        1.0.0
     * @apiName           Update User
     * @apiGroup          Users
     * @apiSampleRequest  /api/v1/users/:id
     *
     * @apiParam {String} name  Nome do Usuário
     * @apiParam {String} email Email do usuário
     * @apiParam {String} password Senha em texto pleno
     *
     * @apiUse            CreateUpdateSuccess
     *
     */


    /**
     * Método Delete
     *
     * @apiDescription    Deleta um usuário. O identificador do usuário deve ser passado na url no local
     *                    indicado <strong>:id</strong>
     *
     * @apiUse            HeaderToken
     * @api               {delete} /api/v1/users/:id Delete
     * @apiVersion        1.0.0
     * @apiName           Delete User
     * @apiGroup          Users
     * @apiSampleRequest  /api/v1/users/:id
     *
     *
     * @apiUse            BooleanSuccess
     *
     */


}
