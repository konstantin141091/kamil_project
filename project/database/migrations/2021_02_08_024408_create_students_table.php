<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('protocol', 50)->comment('протокол, первичный ключ');
            $table->string('surname', 50)->comment('фамилия');
            $table->string('name', 50)->comment('имя');
            $table->string('patronymic', 50)->comment('отчество');
            $table->string('discharge', 20)->nullable()->comment('разряд');
            $table->string('evidence', 50)->nullable()->comment('свидетельство');
            $table->string('certificates', 50)->nullable()->comment('удостоверение');
            $table->date('finish_education')->comment('дата окончания обучения');
//            доп поля админа
            $table->string('qualification', 1000)->nullable()->comment('квалификация');
            $table->string('source', 200)->nullable()->comment('источник');
            $table->string('address', 500)->nullable()->comment('адрес');
            $table->char('phone', 20)->nullable()->comment('телефон');
            $table->unsignedBigInteger('sum')->nullable()->comment('сумма');
            $table->string('comment', 1000)->nullable()->comment('комментарий');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
