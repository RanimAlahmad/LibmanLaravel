<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\AuthorRequest;
use App\Http\Requests\Book\AddEditBookRequet;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategorie;
use App\Models\Categorie;

//Mais Mahrouseh
class BookController extends Controller
{
    public $book;
    public $bookAuthor;
    public $categorie;
    public $bookCategorie;
    public function __construct(Book $book ,BookAuthor $bookAuthor ,Categorie $categorie, BookCategorie $bookCategorie ){
        $this->book = $book;
        $this->bookAuthor = $bookAuthor;
        $this->categorie = $categorie;
        $this->bookCategorie = $bookCategorie;
    }

     //Add Book
     public function store(AddEditBookRequet $request){
        $request->validated();
        $created = $this->book->addBook($request);
        if(!$created)
          return ResponseHelper::creatingFail();
         return ResponseHelper::create($created);
    }

    //View all books
      public function show($id)
      {
          $author = $this->author->find($id);
          if (!$author)
            return ResponseHelper::DataNotFound();
          return ResponseHelper::select($author);
      }

    //View all books of a specific category


}
