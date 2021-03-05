<?php

namespace App\Exports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $students = StudentModel::query()->select([
            'protocol',
            'surname',
            'name',
            'patronymic',
            'discharge',
            'evidence',
            'certificates',
            'finish_education',
            'qualification',
            'source',
            'address',
            'phone',
            'sum',
            'comment',
        ])->get();

        foreach ($students as $student) {
            $student->finish_education = StudentModel::finishEducation($student->finish_education);
        }

        return $students;
    }

    public function headings(): array
    {
        return [
            'Протокол',
            'Фамилия',
            'Имя',
            'Отчество',
            'Разряд',
            'Свидетельство',
            'Удостоверение',
            'Дата',
            'Квалификация',
            'Источник',
            'Адрес',
            'Телефон',
            'Сумма',
            'Комментарий',
        ];
    }

}
