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
        $parent_query = Parents::with(['user']);

        $parents = $parent_query->get();

        return ResponseFormatter::responseSuccessWithData('Successfully retrieve all parents', $parents);
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
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function createParent(Request $request)
    {
        $validation = Validator::make($request->only('certificate_number', 'certificate_date', 'utilization_type', 'address', 'large'), [
            'certificate_number' => 'required|integer',
            'certificate_date' => 'required',
            'utilization_type' => 'required',
            'address' => 'required',
            'large' => 'required',
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
            ]);

            $data = Parents::where('id', $parent->id)->with(['user'])->get();

            if ($data) :
                return ResponseFormatter::responseCreated('Successfully created new parent!', $data);
            else :
                return ResponseFormatter::responseError('Note not created', 400);
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
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function updateParent(Request $request, $id)
    {
        $validation = Validator::make($request->only('auhtor', 'certificate_number', 'certificate_date', 'utilization_type', 'address', 'large'), [
            'certificate_number' => 'required|integer',
            'certificate_date' => 'required',
            'utilization_type' => 'required',
            'address' => 'required',
            'large' => 'required',
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            $parent = Parents::findOrFail($id);
            $parent->update([
                'certificate_number' => $request->certificate_number,
                'certificate_date' => $request->certificate_date,
                'utilization_type' => $request->utilization_type,
                'address' => $request->address,
                'large' => $request->large,
            ]);
            $parent->save();

            if ($parent) :
                return ResponseFormatter::responseSuccessWithData('Successfully update parent', $parent);
            else :
                return ResponseFormatter::responseError('Parent not updated', 400);
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
        $parent = Parents::where([
            'id' => $id,
            'auhtor' => Auth::user()->id
        ]);
        $parent->delete();
        return ResponseFormatter::responseSuccess('Successfully deleting parent');
    }
}
