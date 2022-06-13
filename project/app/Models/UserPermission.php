<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'permission_id',
    ];
}
