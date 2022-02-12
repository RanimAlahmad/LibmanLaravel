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
        $request->validated();
        $created = $this->author->addAuthour($request);
        if(!$created)
          return ResponseHelper::creatingFail();
         return ResponseHelper::create($created);
    }

    //Edit Authors updatingFail
    public function update(AddAuthorRequest $request, $id){
        $request->validated();
        $author = $this->author->find($id);
        if (!$author)
          return ResponseHelper::DataNotFound();
        $updated = $this->author->updateAuthor($request);
        if(!$updated)
          return ResponseHelper::creatingFail();

    }




}
