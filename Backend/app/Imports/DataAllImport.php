<?php

namespace App\Imports;

use App\Models\Childer;
use App\Models\Parents;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataAllImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        try {

            foreach($rows as $row)
            {
                if($row['nomor_sertifikat'] && $row['nama_pemanfaatan']){

                    $this->validate($row);
                    $row['nomor_sertifikat'] = trim($row['nama_pemanfaatan']);
                    $dtJoin = DB::table('childers')
                                ->leftJoin('parents','parents.id','childers.parent_id')
                                ->where('parents.certificate_number','like','%'. $row['nomor_sertifikat'] . '%');
                    $dtJoin = $dtJoin->selectRaw('parents.*,childers.id,parents.id,parents.certificate_number as certificate_number')->first();
                    if(!$dtJoin){
                        throw new Exception('Branch not found');
                    }

                    $dtInduk = Parents::showByName($row['nomor_sertifikat']);
                    if(!$dtInduk) {
                        $params = [];
                        $params['auhtor'] = Auth::user()->id;
                        $params['certificate_number'] = $row['nomor_sertifikat'];
                        $params['certificate_date'] = $row['tanggal_sertifikat'];
                        $params['address'] = $row['alamat'];
                        $params['large'] = $row['luas'];
                        $params['asset_value'] = $row['nilai_aset'];
                        $id = Parents::store($params);
                        $dtInduk = Parents::show($id);
                    }


                    $row['nama_pemanfaatan'] = trim($row['nama_pemanfaatan']);
                    $dtAnak = DB::table('childers')->where('childers.utilization_engagement_name', 'like', '%' . $row['nama_pemanfaatan'] . '%')->first();
                    if(!$dtAnak) {
                        $params = [];
                        $params['rental_retribution'] = $row['sewa_retribusi'];
                        $params['utilization_engagement_type'] = $row['jenis_pemanfaatan'];
                        $params['utilization_engagement_name'] = $row['nama_pemanfaatan'];
                        $params['allotment_of_use'] = $row['peruntukan_penggunaan'];
                        $params['coordinate'] = $row['koordinat'];
                        $params['large'] = $row['luas'];
                        $params['present_condition'] = $row['kondisi_sekarang'];
                        $params['assets_value'] = $row['nilai_aset'];
                        $params['validity_period_of'] = $row['masa_berlaku'];
                        $params['validity_period_until'] = $row['masa_berlaku_sampai'];
                        $params['engagement_number'] = $row['nomor_perikatan'];
                        $params['engagement_date'] = $row['tanggal_perikatan'];
                        $params['description'] = $row['keterangan'];
                        $params['year'] = $row['tahun'];
                        $params['payment_amount'] = $row['jumlah_pembayaran'];
                        $id = Childer::storeAsCustomer($params);
                        $dtAnak = Childer::show($id);
                    }

                    $job_order_id = DB::table('parents')
                    ->insertGetId([
                        'auhtor' => Auth::user()->id,
                        'parent_id' => $dtInduk->id,

                        // 'container_type_id' => $request->container_type_id,
                        'certificate_number' => $row['nomor_sertifikat'],
                        'certificate_date' => Carbon::parse($row['tanggal_sertifikat']),
                        'address' => $row['alamat'],
                        'large' => $row['luas'],
                        'asset_value' => $row['nilai_aset']
                    ]);


                    $params = [];

                    $params['parent_id'] = $dtInduk->id;
                    $params['rental_retribution'] = $row['sewa_retribusi'] ?? null;
                    $params['utilization_engagement_type'] = $row['jenis_pemanfaatan'] ?? null;
                    $params['utilization_engagement_name'] = $row['nama_pemanfaatan'] ?? null;
                    $params['allotment_of_use'] = $row['peruntukan_penggunaan'] ?? null;
                    $params['coordinate'] = $row['koordinat'] ?? null;
                    $params['large'] = $row['luas'] ?? null;
                    $params['present_condition'] = $row['kondisi_sekarang'] ?? null;
                    $params['assets_value'] = $row['nilai_aset'] ?? null;
                    $params['validity_period_of'] = $row['masa_berlaku'] ?? null;
                    $params['validity_period_until'] = $row['masa_berlaku_sampai'] ?? null;
                    $params['engagement_number'] = $row['nomor_perikatan'] ?? null;
                    $params['engagement_date'] = $row['tanggal_perikatan'] ?? null;
                    $params['description'] = $row['keterangan'] ?? null;
                    $params['year'] = $row['tahun'] ?? null;
                    $params['payment_amount'] = $row['jumlah_pembayaran'] ?? null;

                    Parents::storeImport($params, $job_order_id);
                }
            }

        }catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }



    public function validate($params = []) {
        $params = (array) $params;
        if(count($params) == 1) {
            $idx = key($params);
            if(preg_match('/item/', $idx)) {
                $params = (array) $params[$idx];
            }
        }
        $args = [];
        $args['certificate_number'] = $params['nomor_sertifikat'] ?? null;
        $args['certificate_date'] = $params['tanggal_sertifikat'] ?? null;
        $args['address'] = $params['alamat'] ?? null;
        $args['large'] = $params['luas'] ?? null;
        $args['asset_value'] = $params['nilai_aset'] ?? null;
        foreach ($args as $key => $value) {
            if(!$value) {
                throw new Exception($key . ' value can"t be empty !');
            }
        }
    }
}
