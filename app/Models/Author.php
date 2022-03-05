<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;

//mais mahrouseh
class Author extends BaseModel
{
    use HasFactory , SoftDeletes,ModelTrait;

    protected $fillable = ['id','name','picture','brief',];
    protected $hidden = [ 'created_at', 'updated_at','deleted_at',];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors', 'author_id', 'book_id');
    }
    public function bookauthors()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function addAuthour($request){
        $picture = $request->file('picture');
        if($request->hasFile('picture')){
            $picturename = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/AuthorImages'),$picturename);
            $created = $this->create([
                'name' => $request->name,
                'picture' => $picturename,
                'brief' => $request->brief,
            ]);}
            return $created;
    }

    public function updateAuthor($request ,$id){
        $picture = $request->file('picture');
        if($request->hasFile('picture')){
            $picturename = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/AuthorImages'),$picturename);
            $updated = $this->where('id',$id)->update([
                'name' => $request->name,
                'picture' => $picturename,
                'brief' => $request->brief,
            ]);}
            return $updated;
    }

    public function getAuthorWithBooks($id){
        return  $this->select('id','name','picture','brief')->where('id', $id)
        ->with(['bookauthors' => function($q){
            $q ->join('books', 'books.id', '=', 'book_authors.book_id')
               ->select('books.picture','author_id');
        }])->get();
    }

}
