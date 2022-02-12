<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;


//mais mahrouseh

class Book_Categorie extends BaseModel
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'id',
        'book_id',
        'categorie_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
