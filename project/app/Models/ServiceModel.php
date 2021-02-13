<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Validation\Rule;

class ServiceModel extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'protocol';
    protected $fillable = [
        'name', 'surname', 'patronymic', 'finish_education', 'discharge', 'certificates', 'evidence', 'protocol'
    ];

    public static function rules()
    {
        return [
            'name' => "required",
            'surname' => 'required',
            'patronymic' => 'required',
            'finish_education' => 'required',
            'discharge' => 'required',
            'certificates' => 'required',
            'evidence' => 'required',
            'protocol' => 'required',
        ];
    }
}
