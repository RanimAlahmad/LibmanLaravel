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
            $table->foreignId('book_id')->constrained('books', 'id');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('book_id')->constrained('books', 'id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('book_id')->constrained('books', 'id');
        });
        Schema::table('book_author', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors', 'id');
            $table->foreignId('book_id')->constrained('books', 'id');
        });
        Schema::table('book_categorie', function (Blueprint $table) {
            $table->foreignId('categorie_id')->constrained('categories', 'id');
            $table->foreignId('book_id')->constrained('books', 'id');
        });

    }


    public function down()
    {
        //
    }
}
