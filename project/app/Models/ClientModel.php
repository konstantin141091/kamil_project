<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = [
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
            'client' => "required|max:50",
            'source' => 'max:50',
            'address' => 'max:120',
            'comment' => 'max:120',
            'phone' => 'max:20',
            'sum' => 'max:8',
        ];
    }

    public static function attributesName() {

        return [
            'client' => "Заказчик",
            'source' => 'Источник',
            'address' => 'Адрес',
            'comment' => 'Комментарий',
            'phone' => 'Телефон',
            'sum' => 'Сумма'
        ];
    }
}
