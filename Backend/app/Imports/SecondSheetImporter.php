<?php

namespace App\Imports;

use App\Models\Childer;
use App\Models\Parents;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class SecondSheetImporter implements ToModel,WithHeadingRow
{
    use Importable;

    protected $parent;
    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->parent = Parents::select('id')->get();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row['utilization_engagement_type'])) {
            return null;
        }


        $induk = DB::table('parents')->select('id')->first();

        return new Childer([
            'parent_id' => $induk->id ?? NULL,
            'rental_retribution' => $row['rental_retribution'],
            'utilization_engagement_type' => $row['utilization_engagement_type'],
            'utilization_engagement_name' => $row['utilization_engagement_name'],
            'allotment_of_use'  => $row['allotment_of_use'],
            'coordinate'  => $row['coordinate'],
            'large'  => $row['large'],
            'validity_period_of'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['validity_period_of']),
            'validity_period_until'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['validity_period_until']),
            'engagement_number'  => $row['engagement_number'],
            'engagement_date'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['engagement_date']),
            'application_letter'=> 'null',
            'agreement_letter'=> 'null'
        ]);
    }
}
