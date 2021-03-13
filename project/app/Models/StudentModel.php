<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Validation\Rule;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'finish_education',
        'discharge',
        'certificates',
        'evidence',
        'protocol',
        'qualification',
        'source',
        'address',
        'comment',
        'phone',
        'sum',
    ];

    public static function rules()
    {
        return [
            'name' => "required|max:35",
            'surname' => 'required|max:35',
            'patronymic' => 'required|max:35',
            'finish_education' => 'required',
            'discharge' => 'max:20',
            'certificates' => 'max:15',
            'evidence' => 'max:15',
            'protocol' => 'required|max:15',
            'qualification' => "max:1000",
            'source' => 'max:50',
            'address' => 'max:120',
            'comment' => 'max:120',
            'phone' => 'max:20',
            'sum' => 'max:8',
        ];
    }

    public static function attributesName() {
        return [
            'name' => "Имя",
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'finish_education' => 'Дата окончания обучения',
            'discharge' => 'Разряд',
            'certificates' => 'Сертификат',
            'evidence' => 'Свидетельство',
            'protocol' => 'Протокол',
            'qualification' => "Квалификация",
            'source' => 'Источник',
            'address' => 'Адрес',
            'comment' => 'Комментарий',
            'phone' => 'Телефон',
            'sum' => 'Сумма'
        ];
    }

    public static function finishEducation($finish_education) {
        $date = date_create($finish_education);
        return date_format($date, 'd.m.Y');
    }
    public static function finishEducationForDB($finish_education) {
        $date = date_create($finish_education);
        $date = date_format($date, 'Y.m.d');
        return $date;
    }

    public static function checkStudent($request, StudentModel $studentModel) {
        $date = date_create($request->finish_education);
        $date = date_format($date, 'Y.m.d');
        $student = $studentModel::query()->where('protocol', '=', $request->protocol)
            ->where('surname', '=', $request->surname)->where('name', '=', $request->name)
            ->where('patronymic', '=', $request->patronymic)
            ->where('finish_education', '=', $date)->first();
        if ($student) {
            return true;
        } return false;
    }
}
