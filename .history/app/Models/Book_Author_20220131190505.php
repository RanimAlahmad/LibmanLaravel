<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book_Author extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'book_id',
        'author_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function Author()
    {
        return $this->belongsTo(Author::class);
    }
}
