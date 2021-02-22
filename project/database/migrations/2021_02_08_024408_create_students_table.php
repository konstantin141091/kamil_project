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
            $table->string('surname')->comment('фамилия');
            $table->string('name')->comment('имя');
            $table->string('patronymic')->comment('отчество');
            $table->string('discharge')->nullable()->comment('разряд');
            $table->string('evidence')->unique()->nullable()->comment('свидетельство');
            $table->string('certificates')->unique()->nullable()->comment('удостоверение');
            $table->date('finish_education')->nullable()->comment('дата окончания обучения');
//            доп поля админа
            $table->string('client')->nullable()->comment('заказчик');
            $table->string('source')->nullable()->comment('источник');
            $table->string('address')->nullable()->comment('адрес');
            $table->char('phone', 20)->nullable()->comment('телефон');
            $table->unsignedBigInteger('sum')->nullable()->comment('сумма');
            $table->string('comment')->nullable()->comment('комментарий');




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
