<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
    ];

    const student_insert = 'student_insert';
    const student_excel_import = 'student_excel_import';
    const student_excel_export = 'student_excel_export';
    const student_show = 'student_show';
    const student_edit = 'student_edit';
    const student_delete = 'student_delete';
}
