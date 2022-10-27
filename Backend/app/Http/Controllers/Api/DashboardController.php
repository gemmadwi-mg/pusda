<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
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
        $parent_query = Parents::with(['childerPayments']);

        $parents = $parent_query->get();

        return ResponseFormatter::responseSuccessWithData('Successfully retrieve all parents', $parents);
    }

}