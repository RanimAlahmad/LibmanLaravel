<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Traits\ModelTrait;


class Categorie extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name',
    ];

    public function book_categories()
    {
        return $this->hasMany(Book_Categorie::class, 'user_id');
    }
}
