<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categorie extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name',
    ];

    public function book_authors()
    {
        return $this->hasMany(Boo::class, 'user_id');
    }
}
