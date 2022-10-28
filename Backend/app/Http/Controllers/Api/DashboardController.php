<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Paren;
use App\Models\Parents;
use App\Models\Childer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // public function getAll(Request $request, $year)
    // {
    //     $total_induk_query = Parents::where('auhtor','=', Auth::user()->id)->count();

    //     $total_pinjam_pakai__query = Parents::where('utilization_type', '=', 'pinjam_pakai')
    //     ->where('auhtor','=', Auth::user()->id)
    //     ->count();

    //     $total_pakai_sendiri_query = Parents::where('utilization_type', '=', 'pakai_sendiri')
    //     ->where('auhtor','=', Auth::user()->id)
    //     ->count();

    //     $total_sewa_retribusi_query = Parents::where('utilization_type', '=', 'sewa_retibusi')
    //     ->where('auhtor','=', Auth::user()->id)
    //     ->count();

    //     $sewa_query = Childer::with(['payments'])
    //     ->where('payments->year', $year)
    //     // ->where('payments.year' ,'=', $year)
    //     ->get();

    //     return response()->json([
    //         'success'=>true, 
    //         'message'=>'string', 
    //         'data'=> [
    //             "total_tanah_induk" => $total_induk_query,
    //             "total_pinjam_pakai" => $total_pinjam_pakai__query,
    //             "total_pakai_sendiri" => $total_pakai_sendiri_query,
    //             "total_sewa_retribusi" => $total_sewa_retribusi_query,
    //             "total_sewa" => $sewa_query,
    //         ]
    //     ]);
    // }
    public function getAll(Request $request, $year)
    {
        
        $total_tanah_pinjam_pakai_query = Parents::
        where('utilization_type', '=', 'pinjam_pakai')
        ->count();

        $total_pinjam_pakai_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('parents.id', '=', 'childers.parent_id')
                 ->where('utilization_type', '=', 'pinjam_pakai');
        })
        ->sum('childers.rental_retribution');

        $total_tanah_pakai_sendiri_query = Parents::
        where('utilization_type', '=', 'pakai_sendiri')
        ->count();

        $total_pakai_sendiri_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('parents.id', '=', 'childers.parent_id')
                 ->where('utilization_type', '=', 'pakai_sendiri');
        })
        ->sum('childers.rental_retribution');


        $total_tanah_retribusi_query = Childer::join('payments', 'childers.id', '=', 'payments.childrens_id')
        ->where('utilization_engagement_type', '=', 'retribusi')
        ->where('payments.year', '=', $year)
        ->count();

        $total_sewa_retribusi_query = Childer::join('payments', 'childers.id', '=', 'payments.childrens_id')
        ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
        ->where('payments.year', '=', $year)
        ->count();
        
        $jumlah_reribusi = Childer::join('payments', 'childers.id', '=', 'payments.childrens_id')
        ->where('utilization_engagement_type', '=', 'retribusi')
        ->where('payments.year', '=', $year)
        ->sum('payments.payment_amount');

        $data_sewa = Childer::join('payments', 'childers.id', '=', 'payments.childrens_id')
        ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
        ->where('payments.year', '=', $year)
        ->sum('payments.payment_amount');

        $total_pad = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('parents.id', '=', 'childers.parent_id');
        })
        ->join('payments', function ($join) {
            $join->on('childers.id', '=', 'payments.childrens_id');
        })
        ->select(DB::raw('sum(payments.payment_amount+childers.rental_retribution) AS total'))
        ->where('payments.year', '=', $year)
        ->first();

        return response()->json([
            'success' => true,
            'message' => 'Sukses',
            'data' => [ 
                "total_tanah_pakai_sendiri" => $total_tanah_pakai_sendiri_query,
                "total_pakai_sendiri" => $total_pakai_sendiri_query,
                "total_tanah_pinjam_pakai" => $total_tanah_pinjam_pakai_query,
                "total_sewa_pinjam_pakai" => $total_pinjam_pakai_query,
                "total_tanah_retribusi" => $total_tanah_retribusi_query,
                'total_retribusi' => $jumlah_reribusi,
                "total_tanah_sewa_sip_bmd" => $total_sewa_retribusi_query,
                'total_sewa' => $data_sewa,
                "total_pad" => $total_pad
            ]
        ]);
    }
}
