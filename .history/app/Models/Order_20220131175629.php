<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
//Ranim
class Order extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $hidden = [];

    protected $dates = [];

    protected $casts = [];

}
