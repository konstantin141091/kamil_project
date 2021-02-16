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
            'name'     => $row[0],
            'surname'    => $row[1],
            'patronymic' => $row[2],
            'discharge' => $row[3],
            'certificates' => $row[4],
            'evidence' => $row[5],
            'protocol' => $row[6],
            'finish_education' => $row[7],
        ]);
    }
}
