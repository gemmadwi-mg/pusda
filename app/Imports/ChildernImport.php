<?php

namespace App\Imports;

use App\Models\Childer;
use Maatwebsite\Excel\Concerns\ToModel;

class ChildernImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Childer([
            'parent_id' => $row[0],
            'rental_retribution' => $row[1],
            'utilization_engagement_type' => $row[2],
            'utilization_engagement_name' => $row[3],
            'allotment_of_use'  => $row[4],
            'coordinate'  => $row[5],
            'large'  => $row[6],
            'validity_period_of'  => $row[7],
            'validity_period_until'  => $row[8],
            'engagement_number'  => $row[9],
            'engagement_date'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
        ]);
    }
}
