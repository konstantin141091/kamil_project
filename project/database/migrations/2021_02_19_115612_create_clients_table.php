<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client')->comment('заказчик');
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
        Schema::dropIfExists('clients');
    }
}
