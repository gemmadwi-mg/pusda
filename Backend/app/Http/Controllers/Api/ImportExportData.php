<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\ParentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ResponseFormatter;
use App\Imports\ChildernImport;
use App\Imports\IndukImport;
use App\Imports\MultiSheetSelector;
use Exception;
use Illuminate\Support\Facades\Validator;

class ImportExportData extends Controller
{

    /**
     * @OA\Post(
     *     path="/import/file/parent",
     *     tags={"Import"},
     *     operationId="importfileparent",
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

    public function import_parent(Request $request)
    {
        $validation = Validator::make($request->only('file'), [
            'file' => 'required|mimes:csv,xlx,xls,xlsx'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            Excel::import(new IndukImport,request()->file('file'));
            return ResponseFormatter::responseSuccessWithData('Data Berhasil di Import');
        }catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }

    }

    /**
     * @OA\Post(
     *     path="/import/file/children",
     *     tags={"Import"},
     *     operationId="importfilechildren",
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

    public function import_children(Request $request)
    {
        $validation = Validator::make($request->only('file'), [
            'file' => 'required|mimes:csv,xlx,xls,xlsx'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            Excel::import(new IndukImport,request()->file('file'));
            return ResponseFormatter::responseSuccessWithData('Data Berhasil di Import');
        }catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }

    }
}
