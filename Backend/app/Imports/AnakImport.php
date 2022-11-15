<?php

namespace App\Imports;

use App\Models\Childer;
use App\Models\Parents;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class AnakImport implements ToModel,WithHeadingRow
{
    use Importable;

    protected $id;

    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->id = Parents::select('id')->get();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $induk = Parents::where('id',$this->id)->first();

        return new Childer([
            'parent_id' => $induk->id ?? NULL,
            'rental_retribution' => $row['sewa_retribusi'],
            'utilization_engagement_type' => $row['jenis_pemanfaatan'],
            'utilization_engagement_name' => $row['nama_pemanfaatan'],
            'allotment_of_use'  => $row['peruntukan_penggunaan'],
            'coordinate'  => $row['koordinat'],
            'large'  => $row['luas'],
            'present_condition'  => $row['kondisi_sekarang'],
            'assets_value'  => $row['nilai_aset'],
            'validity_period_of'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['masa_berlaku']),
            'validity_period_until'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['masa_berlaku_sampai']),
            'engagement_number'  => $row['nomor_perikatan'],
            'engagement_date'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_perikatan']),
            'description'  => $row['keterangan'],
            'application_letter'=> 'null',
            'agreement_letter'=> 'null'
        ]);
    }
}
