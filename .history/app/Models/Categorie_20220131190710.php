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

    public function Book_categories()
    {
        return $this->hasMany(Book_Categorie::class, 'user_id');
    }
}
