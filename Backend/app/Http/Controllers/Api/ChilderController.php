<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Childer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ChilderController extends Controller
{
    // protected $user;
    // public function __construct()
    // {
    //     $this->user = JWTAuth::parseToken()->authenticate();
    // }


    /**
     * @OA\Get(
     *     path="/api/childer",
     *     tags={"Childers"},
     *     operationId="childers",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */


    public function getAll(Request $request)
    {
        $child_query = Childer::with(['parent']);

        $childs = $child_query->get();

        return ResponseFormatter::responseSuccessWithData('Successfully retrieve all childs', $childs);
    }

    /**
     * @OA\Get(
     *     path="/api/childer/search/{keyword}",
     *     tags={"Childers"},
     *     operationId="childersSearch",
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
            $result = Childer::where('rental_retribution', 'LIKE', '%'. $other. '%')
                    ->orWhere('utilization_engagement_type', 'LIKE', '%'. $other. '%')
                    ->orWhere('utilization_engagement_name', 'LIKE', '%'. $other. '%')
                    ->orWhere('allotment_of_use', 'LIKE', '%'. $other. '%')
                    ->orWhere('coordinate', 'LIKE', '%'. $other. '%')
                    ->orWhere('large', 'LIKE', '%'. $other. '%')
                    ->orWhere('validity_period_of', 'LIKE', '%'. $other. '%')
                    ->orWhere('validity_period_until', 'LIKE', '%'. $other. '%')
                    ->orWhere('engagement_number', 'LIKE', '%'. $other. '%')
                    ->orWhere('engagement_date', 'LIKE', '%'. $other. '%')
                    ->get();
            if(count($result)){
            return ResponseFormatter::responseSuccessWithData('Data ditemukan', $result);
            }else{
            return ResponseFormatter::responseError('Data tidak ditemukan', 400);;
        }

    }




    /**
     * @OA\Post(
     *     path="/api/childer/create",
     *     tags={"Childers"},
     *     operationId="childeradd",
     *     @OA\Parameter(
     *          name="parent_id",
     *          description="parent_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="rental_retribution ",
     *          description="rental_retribution ",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_engagement_type",
     *          description="utilization_engagement_type",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_engagement_name",
     *          description="utilization_engagement_name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="allotment_of_use",
     *          description="allotment_of_use",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="coordinate",
     *          description="coordinate",
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
     *          name="validity_period_of",
     *          description="validity_period_of",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="validity_period_until",
     *          description="validity_period_until",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="engagement_number",
     *          description="engagement_number",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="engagement_date",
     *          description="engagement_date",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="application_letter",
     *          description="application_letter",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="agreement_letter",
     *          description="agreement_letter",
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
    public function createChilder(Request $request)
    {
        $validation = Validator::make($request->only('parent_id', 'rental_retribution', 'utilization_engagement_type', 'utilization_engagement_name', 'allotment_of_use', 'coordinate', 'large', 'validity_period_of', 'validity_period_until', 'engagement_number',  'engagement_date', 'application_letter', 'agreement_letter'), [
            'parent_id' => 'required',
            'rental_retribution' => 'required',
            'utilization_engagement_type' => 'required',
            'utilization_engagement_name' => 'required',
            'allotment_of_use' => 'required',
            'coordinate' => 'required',
            'large' => 'required|integer',
            'validity_period_of' => 'required',
            'validity_period_until' => 'required',
            'engagement_number' => 'required',
            'engagement_date' => 'required',
            'application_letter' => 'required|mimes:doc,docx,pdf,txt',
            // 'agreement_letter' => 'required|mimes:doc,docx,pdf,txt',
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            if ($request->hasFile('application_letter')) {
                $file_application = $request->file('application_letter')->store('public/documents/applicationletter');
            }
            if ($request->hasFile('agreement_letter')) {
                $file_agreement = $request->file('agreement_letter')->store('public/documents/agreementletter');
            }

            $childer = Childer::create([
                'parent_id' => $request->parent_id,
                'rental_retribution' => $request->rental_retribution,
                'utilization_engagement_type' => $request->utilization_engagement_type,
                'utilization_engagement_name' => $request->utilization_engagement_name,
                'allotment_of_use' => $request->allotment_of_use,
                'coordinate' => $request->coordinate,
                'large' => $request->large,
                'validity_period_of' => $request->validity_period_of,
                'validity_period_until' => $request->validity_period_until,
                'engagement_number' => $request->engagement_number,
                'engagement_date' => $request->engagement_date,
                'application_letter' => $file_application,
                'agreement_letter' => $file_agreement,
            ]);

            $data = Childer::where('id', $childer->id)->with(['parent'])->get();

            if ($data) :
                return ResponseFormatter::responseCreated('Berhasil membuat childer', $data);
            else :
                return ResponseFormatter::responseError('Childer tidak berhasil dibuat', 400);
            endif;
        } catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/childer/update/{id}",
     *     tags={"Childers"},
     *     operationId="childerupdate",
     *     @OA\Parameter(
     *          name="parent_id",
     *          description="parent_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="rental_retribution ",
     *          description="rental_retribution ",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_engagement_type",
     *          description="utilization_engagement_type",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="utilization_engagement_name",
     *          description="utilization_engagement_name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="allotment_of_use",
     *          description="allotment_of_use",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="coordinate",
     *          description="coordinate",
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
     *          name="validity_period_of",
     *          description="validity_period_of",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="validity_period_until",
     *          description="validity_period_until",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="engagement_number",
     *          description="engagement_number",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="engagement_date",
     *          description="engagement_date",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="application_letter",
     *          description="application_letter",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="agreement_letter",
     *          description="agreement_letter",
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
    public function updateChilder(Request $request, $id)
    {
        $validation = Validator::make($request->only('parent_id', 'rental_retribution', 'utilization_engagement_type', 'utilization_engagement_name', 'allotment_of_use', 'coordinate', 'large', 'validity_period_of', 'validity_period_until', 'engagement_number',  'engagement_date', 'application_letter', 'agreement_letter'), [
            'parent_id' => 'required',
            'rental_retribution' => 'required',
            'utilization_engagement_type' => 'required',
            'utilization_engagement_name' => 'required',
            'allotment_of_use' => 'required',
            'coordinate' => 'required',
            'large' => 'required|integer',
            'validity_period_of' => 'required',
            'validity_period_until' => 'required',
            'engagement_number' => 'required',
            'engagement_date' => 'required',
            'application_letter' => 'required|mimes:doc,docx,pdf,txt',
            // 'agreement_letter' => 'required|mimes:doc,docx,pdf,txt',
        ]);

        if ($validation->fails()) :
            return ResponseFormatter::responseValidation($validation->errors());
        endif;

        try {
            if ($request->hasFile('application_letter')) {
                $file_application = $request->file('application_letter')->store('public/documents');
            }
            if ($request->hasFile('agreement_letter')) {
                $file_agreement = $request->file('agreement_letter')->store('public/documents');
            }


            $childer = Childer::findOrFail($id);
            $childer->update([
                'parent_id' => $request->parent_id,
                'rental_retribution' => $request->rental_retribution,
                'utilization_engagement_type' => $request->utilization_engagement_type,
                'utilization_engagement_name' => $request->utilization_engagement_name,
                'allotment_of_use' => $request->allotment_of_use,
                'coordinate' => $request->coordinate,
                'large' => $request->large,
                'validity_period_of' => $request->validity_period_of,
                'validity_period_until' => $request->validity_period_until,
                'engagement_number' => $request->engagement_number,
                'engagement_date' => $request->engagement_date,
                'application_letter' => $file_application,
                'agreement_letter' => $file_agreement,
            ]);
            $childer->save();

            if ($childer) :
                return ResponseFormatter::responseSuccessWithData('Successfully update childer', $childer);
            else :
                return ResponseFormatter::responseError('Childer not updated', 400);
            endif;
        } catch (Exception $error) {
            return ResponseFormatter::responseError($error->getMessage(), 400);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/childer/delete/{id}",
     *     tags={"Childers"},
     *     operationId="childerdelete",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */

    public function deleteChilder($id)
    {
        $parent = Childer::where([
            'id' => $id,
        ]);
        $parent->delete();
        return ResponseFormatter::responseSuccess('Successfully deleting childer');
    }
}
