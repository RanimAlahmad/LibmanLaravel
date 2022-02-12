<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\AuthorRequest;
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
         if(!$categories)
         return ResponseHelper::serverError();
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
    public function store(AuthorRequest $request){
        $request->validated();
        $created = $this->author->addAuthour($request);
        if(!$created)
          return ResponseHelper::creatingFail();
         return ResponseHelper::create($created);
    }

    //Edit Authors
    public function updateA(AuthorRequest $request, $id){
        $request->validated();
        $author = $this->author->find($id);
        if (!$author)
           return ResponseHelper::DataNotFound();
        $updated = $this->author->updateAuthor($request ,$id);
        if(!$updated)
           return ResponseHelper::updatingFail();
        return ResponseHelper::update($updated);
    }

    //Delete Author
    public function destroy($id)
    {
        $author =  $this->author->find($id);
        if (!$author)
          return ResponseHelper::DataNotFound();
        $deleted = $author->delete();
        if (!$deleted)
           return ResponseHelper::deletingFail();
         return ResponseHelper::delete();
    }




}
