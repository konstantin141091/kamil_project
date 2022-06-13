<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            [
                'title' => 'Одиночное добавление студента',
                'slug' => 'student_insert',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Добавление в реестр записей таблицей excel',
                'slug' => 'student_excel_import',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Выгрузить записи таблицей excel',
                'slug' => 'student_excel_export',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Поиск и просмотр в реестре',
                'slug' => 'student_show',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Редактирование в реестре',
                'slug' => 'student_edit',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Удаление в реестре',
                'slug' => 'student_delete',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
