<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//Ranim
class AddSocialLoginField extends Migration
{


    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('social_id');
            $table->dropColumn('social_type');
        });
    }
}
