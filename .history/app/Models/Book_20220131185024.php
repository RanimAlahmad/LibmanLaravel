<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use HasFactory , SoftDeletes;

    public function  public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id');
    }()
    {
        return $this->hasMany(Book_Author::class, 'user_id');
    }
}
