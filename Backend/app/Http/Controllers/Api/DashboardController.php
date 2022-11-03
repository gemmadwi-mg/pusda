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
    public function getAll(Request $request, $year)
    {
        $query =  DB::table('parents')
        ->where('auhtor','=', Auth::user()->id)
        ->whereYear('certificate_date', '=', $year);

        $query_rupiah = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        ->where('auhtor','=', Auth::user()->id);

        $total_tanah = $query->count();

        $total_tanah_pinjam_pakai = $query
        ->where('utilization_type', '=', 'pinjam_pakai')
        ->count();

        $total_rupiah_tanah_pinjam_pakai = $query_rupiah
        ->where('utilization_type', '=', 'pinjam_pakai')
        ->whereYear('engagement_date', '=', $year)
        ->sum('rental_retribution');

        $total_tanah_pakai_sendiri = DB::table('parents')
        ->where('auhtor','=', Auth::user()->id)
        ->whereYear('certificate_date', '=', $year)
        ->where('utilization_type', '=', 'pakai_sendiri')
        ->count();

        $total_rupiah_tanah_pakai_sendiri_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        ->where('auhtor','=', Auth::user()->id)
        ->where('utilization_type', '=', 'pakai_sendiri')
        ->whereYear('engagement_date', '=', $year)
        ->sum('rental_retribution');

        $total_tanah_retribusi_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        // ->join('payments', function ($join) {
        //     $join->on('childers.id', '=', 'payments.childrens_id');
        // })
        ->where('auhtor','=', Auth::user()->id)
        ->where('utilization_type', '=', 'sewa_retribusi')
        ->where('utilization_engagement_type', '=', 'retribusi')
        ->whereYear('certificate_date', '=', $year)
        // ->where('year', '=', $year)
        ->count();

        $total_rupiah_retribusi_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        ->join('payments', function ($join) {
            $join->on('childers.id', '=', 'payments.childrens_id');
        })
        ->where('auhtor','=', Auth::user()->id)
        ->where('utilization_engagement_type', '=', 'retribusi')
        ->where('year', '=', $year)
        ->sum('payment_amount');

        $total_tanah_sewa_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        // ->join('payments', function ($join) {
        //     $join->on('childers.id', '=', 'payments.childrens_id');
        // })
        ->where('auhtor','=', Auth::user()->id)
        ->where('utilization_type', '=', 'sewa_retribusi')
        ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
        ->whereYear('certificate_date', '=', $year)
        // ->where('year', '=', $year)
        ->count();

        $total_rupiah_sewa_query = DB::table('parents')
        ->join('childers', function ($join) {
            $join->on('childers.parent_id', '=', 'parents.id');
        })
        ->join('payments', function ($join) {
            $join->on('childers.id', '=', 'payments.childrens_id');
        })
        ->where('auhtor','=', Auth::user()->id)
        ->where('utilization_type', '=', 'sewa_retribusi')
        ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
        ->where('year', '=', $year)
        ->sum('payment_amount');
        

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
                'auhtor' => Auth::user()->id,
                "total_tanah_query" => $total_tanah,
                "total_tanah_pinjam_pakai" => $total_tanah_pinjam_pakai,
                "total_rupiah_tanah_pinjam_pakai" => $total_rupiah_tanah_pinjam_pakai,
                "total_tanah_pakai_sendiri" => $total_tanah_pakai_sendiri,
                "total_rupiah_tanah_pakai_sendiri" => $total_rupiah_tanah_pakai_sendiri_query,
                "total_tanah_retribusi" => $total_tanah_retribusi_query,
                'total_rupiah_retribusi' => $total_rupiah_retribusi_query,
                "total_tanah_sewa_sip_bmd" => $total_tanah_sewa_query,
                'total_rupiah_tanah_sewa_sip_bmd' => $total_rupiah_sewa_query,
            ]
        ]);
    }

    public function getAllUser(Request $request)
    {
        $data = User::with('parents')
        ->paginate();

        return response()->json([
            'success' => true,
            'message' => 'Sukses',
            'data' => $data
        ]);
    }
}
