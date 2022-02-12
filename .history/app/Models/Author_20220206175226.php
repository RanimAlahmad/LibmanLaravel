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
    protected $fillable = [
        'id',
        'name',
        'picture',
        'brief',
    ];

    public function bookauthors()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function addAuthour(){
        $picture = $request->file('picture');
        if($request->hasFile('picture')){
            $picturename = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/AuthorImages'),$picturename);
            $created = $this->author->create([
                'name' => $request->name,
                'picture' => $picturename,
                'brief' => $request->brief,
            ]);

    }

}
