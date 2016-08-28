<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UsersRepository as Repository;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Input;
use Response;

class UserRolesController extends Controller
{

    protected $repository;

    public function __construct(App $app)
    {
        $this->repository = new Repository($app);
    }

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function index($userId)
    {
        $user = User::with('roles')->find($userId);

        if (!$user) {
            return Response::apiResponse([
                'httpCode' => 404,
                'message' => 'Usuário não encontrado.'
            ]);
        }

        $roles = isset($user->roles) ? $user->roles : [];

        return Response::apiResponse([
            'data' => $roles
        ]);
    }

    /**
     * @param $userId
     *
     * @return mixed
     *
     *
     */
    public function store($userId)
    {
        
        $roles = Input::get('roles');
        $updatedUser = $this->repository->attachRoles($userId, $roles);
        return Response::apiResponse([
            'data' => $updatedUser
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $userId
     * @param $roles
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($userId, $roles)
    {
        try {
            $wasSuccessful = $this->repository->detachRoles($userId, $roles);
            return Response::apiResponse([
                'data' => $wasSuccessful
            ]);
        } catch (\Exception $e) {
            return Response::apiResponse([
                'httpCode' => 400,
                'message' => $e->getMessage()
            ]);
        }
    }
}
