<?php

namespace App\Imports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

use \PhpOffice\PhpSpreadsheet\Shared\Date;

class ServiceImport implements ToModel, WithHeadingRow, SkipsOnFailure, WithValidation, WithCalculatedFormulas
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (is_string($row['data'])) {
            $date = date_create($row['data']);
        } else {
            $date = Date::excelToDateTimeObject($row['data']);
        }
//        $date = date_create($row['data']);

        $student = new StudentModel([
            'protocol'     => $row['protokol'],
            'surname'    => $row['familiya'],
            'name' => $row['imya'],
            'patronymic' => $row['otcestvo'],
            'discharge' => $row['razryad'],
            'evidence' => $row['svidetelstvo'],
            'certificates' => $row['udostoverenie'],
            'finish_education' => $date,
            'qualification' => $row['kvalifikaciya'],
            'source' => $row['istocnik'],
            'address' => $row['adres'],
            'phone' => $row['telefon'],
            'sum' => $row['summa'],
            'comment' => $row['kommentarii'],
        ]);

        return $student;
    }

    public function rules(): array
    {
        return [
            'protokol' => 'required',
            'familiya' => 'required',
            'imya' => 'required',
            'otcestvo' => 'required',
            'data' => 'required',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }
}
