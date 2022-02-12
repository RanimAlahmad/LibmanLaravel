<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;


//Ranim
class Rate extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'rate', 'book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected $hidden = [];

    protected $dates = [];


}
