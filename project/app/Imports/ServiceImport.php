<?php

namespace App\Imports;

use App\Models\StudentModel;
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
        $date = date_create($row[7]);

        return new StudentModel([
            'protocol'     => $row[0],
            'surname'    => $row[1],
            'name' => $row[2],
            'patronymic' => $row[3],
            'discharge' => $row[4],
            'evidence' => $row[5],
            'certificates' => $row[6],
            'finish_education' => date_format($date, 'Y-m-d'),
            'qualification' => $row[8],
            'source' => $row[9],
            'address' => $row[10],
            'phone' => $row[11],
            'sum' => $row[12],
            'comment' => $row[13],
        ]);
    }
}
