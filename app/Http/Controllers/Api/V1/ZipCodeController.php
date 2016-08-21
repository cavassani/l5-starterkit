<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Canducci\ZipCode\Facades\ZipCode;
use Canducci\ZipCode\ZipCodeException;
use Illuminate\Support\Facades\Response;

class ZipCodeController extends Controller
{

    /**
     * Método Get
     *
     * @apiDescription    Obtem um usuário específico. O identificador do usuário deve ser passado na url no local
     *                    indicado <strong>:id</strong>
     *
     * @api               {get} /api/v1/zipcode/:zipcode Get
     * @apiVersion        1.0.0
     * @apiName           Get ZipCode Info
     * @apiGroup          ZipCode
     * @apiSampleRequest  /api/v1/zipcode/86430000
     *
     *
     *
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
