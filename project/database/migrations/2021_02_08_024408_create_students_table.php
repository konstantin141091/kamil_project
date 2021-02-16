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
            $table->string('protocol')->primary()->comment('протокол, первичный ключ');
            $table->string('evidence')->unique()->nullable()->comment('свидетельство');
            $table->string('certificates')->unique()->nullable()->comment('удостоверение');
            $table->string('discharge')->nullable()->comment('разряд');
            $table->date('finish_education')->nullable()->comment('дата окончания обучения');
            $table->string('name')->comment('имя');
            $table->string('surname')->comment('фамилия');
            $table->string('patronymic')->comment('отчество');
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
