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
