<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\State;
use App\Repositories\StatesRepository as Repository;
use Illuminate\Support\Facades\Response;
use Lfalmeida\Lbase\Controllers\ApiBaseController;

class StatesController extends ApiBaseController
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


    public function cities($id)
    {
        $cities = State::find($id)->cities()->get();
        return Response::apiResponse([
            'data' => $cities
        ]);
    }

}
