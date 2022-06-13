<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->dropForeign(['permission_id']);
        });
        Schema::dropIfExists('user_permissions');
    }
}
