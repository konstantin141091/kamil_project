<?php

namespace App\Imports;

use App\Models\ServiceModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ServiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);
        return new ServiceModel([
            'name'     => $row[0],
            'surname'    => $row[1],
            'patronymic' => $row[2],
            'discharge' => $row[3],
            'certificates' => $row[4],
            'evidence' => $row[5],
            'protocol' => $row[6],
            'finish_education' => $row[7],
//            'created_at' => '2021-02-12 03:07:22',
//            'updated_at' => '2021-02-12 03:07:22',
//            'name'     => 'asd',
//            'surname'    => 'asd',
//            'patronymic' => 'sdffff',
//            'discharge' => '12',
//            'certificates' => '312',
//            'evidence' => '33333',
//            'protocol' => '2133',
//            'finish_education' => '2021-02-03',
        ]);
    }
}
