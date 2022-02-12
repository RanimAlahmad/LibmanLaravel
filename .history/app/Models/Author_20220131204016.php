<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

//mais mahrouseh
class Author extends BaseModel
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'picture',
        'brief',
    ];

    public function book_authors()
    {
        return $this->hasMany(Book_Author::class, 'user_id');
    }

}
