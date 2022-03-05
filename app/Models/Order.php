<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;

//Ranim
class Order extends BaseModel
{
    use HasFactory, SoftDeletes, ModelTrait;

    protected $fillable = ['id', 'user_id', 'book_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function orderActivate($data)
    {
        $data['user_id'] = Auth::id();
        $insertData = [];
        foreach ($data['order'] as $order) {
            $temp = $order;
            $temp['user_id'] = Auth::id();
            $temp['created_at'] = Carbon::now();
            $temp['updated_at'] = Carbon::now();
            array_push($insertData, $temp);
        }
        return $this->insertData($insertData);

    }
}
