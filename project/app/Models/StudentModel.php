<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    /**
     * @return array
     */
    public static function rules() :array
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

    /**
     * @return array
     */
    public static function attributesName() : array
    {
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

    /**
     * @param string $finish_education
     * @return string
     */
    public static function finishEducation(string $finish_education) : string
    {
        $date = date_create($finish_education);
        return date_format($date, 'd.m.Y');
    }


    /**
     * @param string $finish_education
     * @return string
     */
    public function finishEducationForDB(string $finish_education) : string
    {
        $date = date_create($finish_education);
        $date = date_format($date, 'Y.m.d');
        return $date;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function checkStudent(Request $request) : bool
    {
        $date = date_create($request->input('finish_education'));
        $date = date_format($date, 'Y.m.d');
        $student = self::query()
            ->where('protocol', '=', $request->input('protocol'))
            ->where('surname', '=', $request->input('surname'))
            ->where('name', '=', $request->input('name'))
            ->where('patronymic', '=', $request->input('patronymic'))
            ->where('finish_education', '=', $date)
            ->where('id', '!=', $this->id)
            ->first();
        if ($student) {
            return true;
        } return false;
    }
}
