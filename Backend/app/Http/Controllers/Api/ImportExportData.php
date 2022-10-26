<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\ParentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ResponseFormatter;
use App\Imports\ChildernImport;
use Exception;
use Illuminate\Support\Facades\Validator;

class ImportExportData extends Controller
{

    /**
     * @OA\Post(
     *     path="/import/file/parent",
     *     tags={"Import"},
     *     operationId="importParent",
     *     @OA\Parameter(
     *          name="file",
     *          description="file",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function storeImportParent(Request $request) {

        // validasi
		// $this->validate($request, [
		// 	'file' => 'required|mimes:xlsx'
		// ]);

        $validation = Validator::make($request->only('file'), [
            'file' => 'required|mimes:xlsx'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            Excel::import(new ParentsImport, request()->file('file'));
            return ResponseFormatter::responseSuccessWithData('Data Induk Berhasil di Import');
        }catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }

    }

        /**
     * @OA\Post(
     *     path="/import/file/childer",
     *     tags={"Import"},
     *     operationId="importChilder",
     *     @OA\Parameter(
     *          name="file",
     *          description="file",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function storeImportClidern(Request $request) {

        // validasi
		// $this->validate($request, [
		// 	'file' => 'required|mimes:xlsx'
		// ]);

        $validation = Validator::make($request->only('file'), [
            'file' => 'required|mimes:xlsx'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            Excel::import(new ChildernImport, request()->file('file'));
            return ResponseFormatter::responseSuccessWithData('Data Anak Berhasil di Import');
        }catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }

    }
}
