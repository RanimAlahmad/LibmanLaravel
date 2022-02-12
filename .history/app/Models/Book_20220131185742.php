<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        '',
        'lang',
        'password',
        'is_admin',
    ];

    public function book_authors()
    {
        return $this->hasMany(Book_Author::class, 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function book_categories()
    {
        return $this->hasMany(Book_Categorie::class, 'user_id');
    }

}
