<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\ParentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ResponseFormatter;
use App\Imports\ChildernImport;
use App\Imports\MultiSheetSelector;
use Exception;
use Illuminate\Support\Facades\Validator;

class ImportExportData extends Controller
{




    /**
     * @OA\Post(
     *     path="/import/file",
     *     tags={"Import"},
     *     operationId="importfile",
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

    public function import_multiple_different_formats(Request $request) {


        $validation = Validator::make($request->only('file'), [
            'file' => 'required|mimes:csv,xlx,xls,xlsx'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            Excel::import(new MultiSheetSelector,request()->file('file'));
            return ResponseFormatter::responseSuccessWithData('Data Berhasil di Import');
        }catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }

    }
}
