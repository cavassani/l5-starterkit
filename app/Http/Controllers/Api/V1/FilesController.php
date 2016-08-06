<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lfalmeida\Lbase\Utils\Uploader;
use Response;

class FilesController extends Controller
{

    public function putUpload(Request $request)
    {
        return $this->upload($request);
    }

    private function upload(Request $request)
    {

        $uploader = new Uploader($request->get('fileType'));

        try {
            $uploader->handle($request->file());
            $filesList = $uploader->getUploadedFilesList();

            return Response::apiResponse([
                'data' => $filesList
            ]);

        } catch (\Exception $e) {
            return Response::apiResponse([
                'httpCode' => 400,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function postUpload(Request $request)
    {
        return $this->upload($request);
    }

}
