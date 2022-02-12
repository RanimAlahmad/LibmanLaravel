<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeginKeys extends Migration
{

    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
        });
    }


    public function down()
    {
        //
    }
}
