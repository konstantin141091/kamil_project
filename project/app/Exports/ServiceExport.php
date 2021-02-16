<?php

namespace App\Exports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ServiceExport implements FromCollection, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentModel::all();
    }
}
