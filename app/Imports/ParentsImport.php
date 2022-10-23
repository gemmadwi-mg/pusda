<?php

namespace App\Imports;

use App\Models\Parents;
use Maatwebsite\Excel\Concerns\ToModel;

class ParentsImport implements ToModel
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

        return new Parents([
            'auhtor'  => $row[0],
            'certificate_number' => $row[1],
            'certificate_date'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'utilization_type'=> $row[3],
            'address'=> $row[4],
            'large'=> $row[5]
        ]);
    }
}
