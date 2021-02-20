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

        return new StudentModel([
            'protocol'     => $row[0],
            'surname'    => $row[1],
            'name' => $row[2],
            'patronymic' => $row[3],
            'discharge' => $row[4],
            'evidence' => $row[5],
            'certificates' => $row[6],
            'finish_education' => $row[7],
        ]);
    }
}
