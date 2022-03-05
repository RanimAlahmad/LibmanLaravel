<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;

//Ranim
class Favorite extends BaseModel
{
    use HasFactory, SoftDeletes ,ModelTrait;

    protected $fillable = ['id','user_id','book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function favoriteActivate($data)
    {
        $data['user_id'] = Auth::id();
        $Favorite = $this->findData($data);
        if (collect($Favorite)->isEmpty()) {
            $Favorite = $this->createData($data);
        } else {
            $Favorite->delete();
        }
        return $Favorite;

    }
}
