<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Parents;
use App\Models\Childer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function getAll(Request $request, $year)
    {
        $query =  DB::table('parents')
            ->where('auhtor', '=', Auth::user()->id)
            ->whereYear('certificate_date', '=', $year);

        $query_rupiah = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('auhtor', '=', Auth::user()->id);

        $total_tanah = $query->count();

        $total_tanah_pinjam_pakai = $query
            ->where('utilization_type', '=', 'pinjam_pakai')
            ->count();

        $total_rupiah_tanah_pinjam_pakai = $query_rupiah
            ->where('utilization_type', '=', 'pinjam_pakai')
            ->whereYear('engagement_date', '=', $year)
            ->sum('rental_retribution');

        $total_tanah_pakai_sendiri = DB::table('parents')
            ->where('auhtor', '=', Auth::user()->id)
            ->whereYear('certificate_date', '=', $year)
            ->where('utilization_type', '=', 'pakai_sendiri')
            ->count();

        $total_rupiah_tanah_pakai_sendiri_query = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('auhtor', '=', Auth::user()->id)
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
            ->where('auhtor', '=', Auth::user()->id)
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
            ->where('auhtor', '=', Auth::user()->id)
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
            ->where('auhtor', '=', Auth::user()->id)
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
            ->where('auhtor', '=', Auth::user()->id)
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

    public function getAllUser(Request $request, $year)
    {
        // $data = DB::table('users')
        // ->join('parents', function ($join) {
        //     $join->on('parents.auhtor', '=', 'users.id');
        // })
        // ->groupBy('parents.auhtor')

        $data = User::withCount(['parents as total_tanah_induk' => function (Builder $query) use ($year) {
            $query->whereYear('certificate_date', $year);
        }, 'parents as total_tanah_pinjam_pakai' => function (Builder $query) {
            $query->where('utilization_type', 'pinjam_pakai');
        }, 'parents as total_tanah_pakai_sendiri' => function (Builder $query) {
            $query->where('utilization_type', 'pakai_sendiri');
        }, 'childers as total_tanah_sewa_sip_bmd' => function (Builder $query) {
            $query->where('utilization_engagement_type', 'sewa_sip_bmd');
        }, 'childers as total_tanah_retribusi' => function (Builder $query) {
            $query->where('utilization_engagement_type', 'retribusi');
        }, 'childers as total_rupiah_tanah_pinjam_pakai' => function ($query) {
            $query->where('utilization_type', '=', 'pinjam_pakai')->select(DB::raw('sum(rental_retribution)'));
        }, 'childers as total_rupiah_tanah_pakai_sendiri' => function ($query) {
            $query->where('utilization_type', '=', 'pakai_sendiri')->select(DB::raw('sum(rental_retribution)'));
        }, 'payments as total_rupiah_tanah_sewa_sip_bmd' => function ($query) use ($year) {
            $query->where('utilization_engagement_type', '=', 'sewa_sip_bmd')->where('payments.year', '=', $year)->select(DB::raw('sum(payment_amount)'));
        }, 'payments as total_rupiah_tanah_retribusi' => function ($query) use ($year) {
            $query->where('utilization_engagement_type', '=', 'retribusi')->where('payments.year', '=', $year)->select(DB::raw('sum(payment_amount)'));
        },])
            ->get();


        $total_tanah = Parents::count();

        $total_tanah_pinjam_pakai = Parents::with('childers')->where('utilization_type', '=', 'pinjam_pakai')->count();

        $total_rupiah_tanah_pinjam_pakai = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('utilization_type', '=', 'pinjam_pakai')
            ->sum('rental_retribution');

        $total_tanah_pakai_sendiri = Parents::with('childers')->where('utilization_type', '=', 'pakai_sendiri')->count();

        $total_rupiah_tanah_pakai_sendiri = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('utilization_type', '=', 'pakai_sendiri')
            ->sum('rental_retribution');

        $total_tanah_retribusi = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('utilization_type', '=', 'sewa_retribusi')
            ->where('utilization_engagement_type', '=', 'retribusi')
            ->count();

        $total_rupiah_retribusi = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->join('payments', function ($join) {
                $join->on('childers.id', '=', 'payments.childrens_id');
            })
            ->where('utilization_engagement_type', '=', 'retribusi')
            ->sum('payment_amount');

        $total_tanah_sewa = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->where('utilization_type', '=', 'sewa_retribusi')
            ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
            ->count();

        $total_rupiah_sewa = DB::table('parents')
            ->join('childers', function ($join) {
                $join->on('childers.parent_id', '=', 'parents.id');
            })
            ->join('payments', function ($join) {
                $join->on('childers.id', '=', 'payments.childrens_id');
            })
            ->where('utilization_type', '=', 'sewa_retribusi')
            ->where('utilization_engagement_type', '=', 'sewa_sip_bmd')
            ->sum('payment_amount');


        return response()->json([
            'success' => true,
            'message' => 'Sukses',
            'data' => $data,
            "keseluruhan" => [
                "total_tanah" => $total_tanah,
                "total_tanah_pinjam_pakai" => $total_tanah_pinjam_pakai,
                "total_rupiah_tanah_pinjam_pakai" => $total_rupiah_tanah_pinjam_pakai,
                "total_tanah_pakai_sendiri" => $total_tanah_pakai_sendiri,
                "total_rupiah_tanah_pakai_sendiri" => $total_rupiah_tanah_pakai_sendiri,
                "total_tanah_retribusi" => $total_tanah_retribusi,
                "total_rupiah_retribusi" => $total_rupiah_retribusi,
                "total_tanah_sewa" => $total_tanah_sewa,
                "total_rupiah_sewa" => $total_rupiah_sewa
            ]
        ]);
    }
}
