<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Canducci\ZipCode\Facades\ZipCode;
use Canducci\ZipCode\ZipCodeException;
use Illuminate\Support\Facades\Response;

class ZipCodeController extends Controller
{

    /**
     *  Retorna informações para o cep fornecido
     *
     *
     * @SWG\Get(path="/zipcode/{cep}",
     *   tags={"ZipCode"},
     *   summary="Informações sobre CEP",
     *   description="Retorna informações para o cep fornecido",
     *   operationId="zipcodeData",
     *   produces={"application/json"},
     *   consumes={"application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="cep",
     *     type="string",
     *     description="CEP para consulta",
     *     required=true
     *   ),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     *
     */
    public function findByCep($cep)
    {
        try {

            $zipCodeInfo = ZipCode::find($cep);

            if($zipCodeInfo) {
                return Response::apiResponse([
                    'data' => $zipCodeInfo->getArray()
                ]);
            }

            return Response::apiResponse([
                'httpCode' => 404,
                'message' => sprintf('O CEP %s não foi encontrado.', $cep)
            ]);

        } catch (ZipCodeException $e) {

            return Response::apiResponse([
                'httpCode' => 400,
                'message' => $e->getMessage()
            ]);

        }
    }

}
