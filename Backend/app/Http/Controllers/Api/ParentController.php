<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ParentController extends Controller
{
    // protected $user;
    // public function __construct()
    // {
    //     $this->user = JWTAuth::parseToken()->authenticate();
    // }


    /**
     * @OA\Get(
     *     path="/api/parent",
     *     tags={"Parents"},
     *     operationId="parents",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */


    public function getAll(Request $request)
    {
        $parent_query = Parents::with(['user'])
            ->where('auhtor', Auth::user()->id)
            ->orWhere('auhtor', '=', 1)
            ->paginate(10);

        return ResponseFormatter::responseSuccessWithData('Berhasil mendapatkan data tanah induk', $parent_query);
    }

    public function getById(Request $request, $id)
    {
        $parent_query = Parents::with(['user'])->where('auhtor', Auth::user()->id);

        $parent = $parent_query->find($id);

        if ($parent) {
            return ResponseFormatter::responseSuccessWithData('Tanah induk ditemukan', $parent);
        }

        return ResponseFormatter::responseError("Tanah induk tidak ditemukan", 400);
    }

    /**
     * @OA\Get(
     *     path="/api/parent/search/{keyword}",
     *     tags={"Parents"},
     *     operationId="parentsSearch",
     *     @OA\Parameter(
     *          name="other",
     *          description="other",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function search($other)
    {
        $result = Parents::with(['user'])
            ->where('auhtor', '=', Auth::user()->id)
            ->orwhere('certificate_number', 'LIKE', '%' . $other . '%')
            ->orWhere('certificate_date', 'LIKE', '%' . $other . '%')
            ->orWhere('utilization_type', 'LIKE', '%' . $other . '%')
            ->orWhere('address', 'LIKE', '%' . $other . '%')
            ->orWhere('large', 'LIKE', '%' . $other . '%')
            ->orWhere('asset_value', 'LIKE', '%' . $other . '%')
            ->get();
        if (count($result)) {
            return ResponseFormatter::responseSuccessWithData('Data ditemukan', $result);
        } else {
            return response()->json(['Result' => 'Data tidak ditemukan'], 404);
        }
    }




    /**
     * @OA\Post(
     *     path="/api/parent/create",
     *     tags={"Parents"},
     *     operationId="parentadd",
     *     @OA\Parameter(
     *          name="auhtor",
     *          description="user_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="certificate_number ",
     *          description="certificate_number ",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="certificate_date",
     *          description="certificate_date",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_type",
     *          description="utilization_type",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="address",
     *          description="address",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="large",
     *          description="large",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="asset_value",
     *          description="large",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function createParent(Request $request)
    {
        $validation = Validator::make($request->only('certificate_number', 'certificate_date', 'utilization_type', 'address', 'large', 'asset_value'), [
            'certificate_number' => 'required|integer',
            'certificate_date' => 'required',
            'utilization_type' => 'required',
            'address' => 'required',
            'large' => 'required',
            'asset_value' => 'required'
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            $parent = Parents::create([
                'auhtor' => Auth::user()->id,
                'certificate_number' => $request->certificate_number,
                'certificate_date' => $request->certificate_date,
                'utilization_type' => $request->utilization_type,
                'address' => $request->address,
                'large' => $request->large,
                'asset_value' => $request->asset_value,
            ]);

            $data = Parents::where('id', $parent->id)->with(['user'])->get();

            if ($data) :
                return ResponseFormatter::responseCreated('Berhasil membuat tanah induk', $data);
            else :
                return ResponseFormatter::responseError('Tanah induk gagal dibuat', 400);
            endif;
        } catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/parent/update/{id}",
     *     tags={"Parents"},
     *     operationId="parentupdate",
     *     @OA\Parameter(
     *          name="certificate_number ",
     *          description="certificate_number ",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="certificate_date",
     *          description="certificate_date",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_type",
     *          description="utilization_type",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="address",
     *          description="address",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="large",
     *          description="large",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="asset_value",
     *          description="large",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function updateParent(Request $request, $id)
    {
        $validation = Validator::make($request->only('auhtor', 'certificate_number', 'certificate_date', 'utilization_type', 'address', 'large', 'asset_value'), [
            'certificate_number' => 'required|integer',
            'certificate_date' => 'required',
            'utilization_type' => 'required',
            'address' => 'required',
            'large' => 'required',
            'asset_value' => 'required',
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            $parent = Parents::find($id);

            if (!$parent) {
                throw new Exception('Tanah induk tidak ditemukan');
            }

            $parent->update([
                'certificate_number' => $request->certificate_number,
                'certificate_date' => $request->certificate_date,
                'utilization_type' => $request->utilization_type,
                'address' => $request->address,
                'large' => $request->large,
                'asset_value' => $request->asset_value
            ]);
            $parent->save();

            if ($parent) :
                return ResponseFormatter::responseSuccessWithData('Sukses update tanah induk', $parent);
            else :
                return ResponseFormatter::responseError('Tanah induk gagal di update', 400);
            endif;
        } catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/parent/delete/{id}",
     *     tags={"Parents"},
     *     operationId="parentdelete",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */

    public function deleteParent($id)
    {
        try {
            $parent = Parents::find($id);

            if (!$parent) {
                throw new Exception('Tanah induk tidak ditemukan');
            }

            $parent->delete();

            return ResponseFormatter::responseSuccess('Sukses hapus tanah induk');
        } catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }
    }
}
