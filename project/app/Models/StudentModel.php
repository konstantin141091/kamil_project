<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Validation\Rule;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'protocol';
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'finish_education',
        'discharge',
        'certificates',
        'evidence',
        'protocol',
        'client',
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
            'finish_education' => '',
            'discharge' => 'max:2',
            'certificates' => 'max:15',
            'evidence' => 'max:15',
            'protocol' => 'required|max:15',
            'client' => "max:50",
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
            'client' => "Заказчик",
            'source' => 'Источник',
            'address' => 'Адрес',
            'comment' => 'Комментарий',
            'phone' => 'Телефон',
            'sum' => 'Сумма'
        ];
    }
}
