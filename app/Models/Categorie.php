<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;


//mais mahrouseh

class Categorie extends BaseModel
{
    use HasFactory , SoftDeletes, ModelTrait;

    protected $fillable = ['id','name',];
    protected $hidden = [ 'created_at', 'updated_at','deleted_at',];

    public function bookcategories()
    {
        return $this->hasMany(BookCategorie::class);
    }

    public function categoriesWithBooks(){
        $datas = $this->select('id','name')->with(['bookcategories' => function($q){
            $q ->join('books', 'books.id', '=', 'book_categories.book_id')
               ->select('books.id','books.name','books.picture','books.price','categorie_id');
        }])->get();
        return  $datas;


    }
}
