<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;


//mais mahrouseh

class Book extends BaseModel
{
    use HasFactory , SoftDeletes ,ModelTrait;

    protected $fillable = [
        'id',
        'name',
        'picture',
        'describe',
        'price',
    ];

    public function bookauthors()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function book_categories()
    {
        return $this->hasMany(Book_Categorie::class,);
    }

}
