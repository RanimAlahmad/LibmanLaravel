<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book_Author extends Model
{
    use HasFactory , SoftDeletes;

    public function book()
    {
        return $this->belongsTo(Bo::class);
    }
}
