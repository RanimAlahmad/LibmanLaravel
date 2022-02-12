<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;
use Illuminate\Support\Facades\DB;
use App\Models\BookCategorie;

//mais mahrouseh
class Book extends BaseModel
{
    use HasFactory , SoftDeletes ,ModelTrait;

    protected $fillable = ['id', 'name','picture','describe','price',];
    protected $hidden = ['created_at', 'updated_at','deleted_at',];

    public function bookauthors()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function bookcategories()
    {
        return $this->hasMany(BookCategorie::class,);
    }

    public function addBook($request){
        $picture = $request->file('picture');
        if($request->hasFile('picture')){
            $picturename = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/BookImages'),$picturename);
            $created = $this->create([
                'name' => $request->name,
                'picture' => $picturename,
                'describe' => $request->describe,
                'price' => $request->price,
            ]);}
            return $created;
    }

    public function allBook(){
        return $this->;
    }

}
