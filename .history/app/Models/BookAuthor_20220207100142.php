<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;


//mais mahrouseh

class BookAuthor extends BaseModel
{
    use HasFactory , SoftDeletes ,ModelTrait;

    protected $fillable = ['id','book_id','author_id',];
    protected $hidden = [ 'created_at', 'created_at','deleted_at',];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function Author()
    {
        return $this->belongsTo(Author::class);
    }
}
