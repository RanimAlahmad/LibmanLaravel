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
            $name = rand().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/AuthorImages'),$name);
            $created = $this->author->create({
                'name' => $request->name,
            });
            return ResponseHelper::create($created);
        }
        else{return response()->json('null');}



}
}
