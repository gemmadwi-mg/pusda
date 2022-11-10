<?php

namespace App\Exports;

use App\Models\Childer;
use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataAllUptExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Parents::with('childers')->get();
    }

    public function map($invoice): array
    {
        return [
            $invoice->auhtor = Auth::user()->name,
            $invoice->certificate_number,
            $invoice->certificate_date,
            $invoice->address,
            $invoice->large,
            $invoice->asset_value,

            // $invoice->childers->utilization_engagement_type,
            // $invoice->utilization_engagement_name,
            // $invoice->rental_retribution,
            // $invoice->allotment_of_use,
            // $invoice->coordinate,
            // $invoice->large,
            // $invoice->present_condition,
            // $invoice->assets_value,
            // $invoice->validity_period_of,
            // $invoice->validity_period_until,
            // $invoice->engagement_number,
            // $invoice->engagement_date,
            // $invoice->description,
            // $invoice->year,
            // $invoice->payment_amount,

        ];
    }

    public function headings(): array
    {
        return [
            'Nama UPT',
            'Nomor Sertifikat',
            'Tanggal Sertifikat',
            'Alamat',
            'Luas',
            'Nilai Aset',

            'Jenis Pemanfaatan',
            'Nama Penggunaan',
            'Sewa Retribusi',
            'Peruntukan Penggunaan',
            'koordinat',
            'Luas',
            'Kondisi Sekarang',
            'Nilai Aset',
            'Masa Berlaku',
            'Masa Berlaku Sampai',
            'Nomor Perikatan',
            'Tanggal Perikatan',
            'keterangan',

            'Tahun',
            'Jumlah Pembayaran',
        ];
    }
}
