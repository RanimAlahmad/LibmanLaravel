<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\AddAuthorRequest;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Author;

//Mais Mahrouseh
class AuthorController extends Controller
{
    public $author;
    public function __construct(Author $author){
        $this->author = $author;
    }

     //show all Authors
     public function index()
     {
         $authors = $this->author->getData();
         return ResponseHelper::select($authors);
     }

     //show specific Author
    public function show($id)
    {
        $author = $this->author->find($id);
        if (!$author)
          return ResponseHelper::DataNotFound();
        return ResponseHelper::select($author);
    }

    //Add Authors
    public function store(AddAuthorRequest $request){
        $validated = $request->validated();
        $picture = $request->file('picture');
        if($request->hasFile('picture')){
            $picturename = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/AuthorImages'),$picturename);
            $created = $this->author->create([
                'name' => $request->name,
                'picture' => $picturename,
                'brief' => $request->brief,
            ]);
            return ResponseHelper::create($created);
        }
        
        else{ return ResponseHelper::create($created);}



}
}
