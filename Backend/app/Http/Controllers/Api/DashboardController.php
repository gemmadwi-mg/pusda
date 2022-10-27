<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Paren;
use App\Models\Parents;
use App\Models\Payment;
use App\Models\User;
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


    public function getAll(Request $request, $year)
    {
        $total_induk_query = Parents::where('auhtor','=', Auth::user()->id)->count();

        $total_pinjam_pakai__query = Parents::where('utilization_type', '=', 'pinjam_pakai')->where('auhtor','=', Auth::user()->id)->count();

        $total_pakai_sendiri_query = Parents::where('utilization_type', '=', 'pakai_sendiri')->where('auhtor','=', Auth::user()->id)->count();

        $total_sewa_retribusi_query = Parents::where('utilization_type', '=', 'sewa_retibusi')->where('auhtor','=', Auth::user()->id)->count();
        
        $parent_query = Payment::with(['childer.payments']);

        return response()->json([
            'success'=>true, 
            'message'=>'string', 
            'data'=> [
                "total_tanah_induk" => $total_induk_query,
                "total_pinjam_pakai" => $total_pinjam_pakai__query,
                "total_pakai_sendiri" => $total_pakai_sendiri_query,
                "total_sewa_retribusi" => $total_sewa_retribusi_query,
                "total_pinjam_pakai_rupiah" => $parent_query,
            ]
        ]);
    }

}