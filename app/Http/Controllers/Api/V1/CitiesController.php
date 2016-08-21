<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\CitiesRepository as Repository;
use Illuminate\Support\Facades\Response;
use Lfalmeida\Lbase\Controllers\ApiBaseController;

class CitiesController extends ApiBaseController
{
    /**
     * NewsController constructor.
     *
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Método List
     *
     * @apiDescription    Lista os registros com paginação de resultados.
     *
     *
     * @apiUse            HeaderToken
     * @api               {get} /api/v1/cities List
     * @apiVersion        1.0.0
     * @apiName           List Cities
     * @apiGroup          Cities
     * @apiSampleRequest  /api/v1/cities
     *
     *
     * @apiUse            PaginationParams
     * @apiUse            PaginationSuccess
     *
     */


    /**
     * Método Get
     *
     * @apiDescription    Obtem um registro específico. O identificador do registro deve ser passado na url no local
     *                    indicado <strong>:id</strong>
     *
     * @apiUse            HeaderToken
     * @api               {get} /api/v1/cities/:id Get
     * @apiVersion        1.0.0
     * @apiName           Get Cities
     * @apiGroup          Cities
     * @apiSampleRequest  /api/v1/cities/:id
     *
     *
     * @apiUse            ObjectSuccess
     *
     */

    /**
     * Método listByStateId
     *
     * @apiDescription      Obtém uma lista de cidades que pertencerem ao estado cujo id for
     *                      igual ao passado na url no local
     *                      indicado <strong>:stateId</strong>
     *
     * @apiUse              HeaderToken
     * @api                 {get} /api/v1/citiesByStateId/:stateId List Cities by StateId
     * @apiVersion          1.0.0
     * @apiName             ListCitiesByStateId
     * @apiGroup            Cities
     * @apiSampleRequest    /api/v1/citiesByStateId/:stateId
     *
     * @apiSuccessExample   Success-Response:
     * HTTP/1.1 200 OK
     *
     *  {
     *      "status": "success",
     *      "data": [
     *          {
     *              "id": 1,
     *              "stateId": 41,
     *              "name": "Bandeirantes",
     *              "state": {
     *                  "id": 41,
     *                  "name": "Paraná",
     *                  "uf": "PR"
     *              }
     *          }
     *      ],
     *      "message": "Ok"
     *  }
     *
     * @apiSuccess {String}   status    Status da api.
     * @apiSuccess {Object[]} data      Array contendo os objetos retornados.
     * @apiSuccess {String}   message   Mensagem.
     *
     * @param $stateId
     * @return mixed
     */

    public function listByStateId($stateId){
        $allResults = $this->repository->listbyStateId($stateId);

        return Response::apiResponse([
            'data' => $allResults
        ]);
    }
 
}
