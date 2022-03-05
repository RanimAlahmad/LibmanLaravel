<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\AuthorRequest;
use App\Http\Requests\Book\AddBookWhithACRequet;
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

    public function __construct(Book $book, BookAuthor $bookAuthor, Categorie $categorie, BookCategorie $bookCategorie)
    {
        $this->book = $book;
        $this->bookAuthor = $bookAuthor;
        $this->categorie = $categorie;
        $this->bookCategorie = $bookCategorie;
    }

    //Add Book
    public function store(AddEditBookRequet $request)
    {
        $request->validated();
        $created = $this->book->addBook($request);
        if (!$created)
            return ResponseHelper::creatingFail();
        return ResponseHelper::create($created);
    }

    //View all books (picture-name-price-rate-categories)
    public function index()
    {
        $selected = $this->book->allBook();
        if (!$selected)
            return ResponseHelper::serverError();
        return ResponseHelper::select($selected);
    }


    //View specific book (picture-name-describe-price-rate- names of authors - name of categries)
    public function show($id)
    {
        $selectId = $this->book->find($id);

        if (!$selectId)
            return ResponseHelper::DataNotFound();
        $selected = $this->book->specificBook($id);
        if (!$selected)
            return ResponseHelper::serverError();
        return ResponseHelper::select($selected);
    }

    //Add a book with its categories and authors
    public function addBookWithCA(AddBookWhithACRequet $request)
    {
        $request->validated();
        $created = $this->book->addBookWith($request);
        if (!$created)
            return ResponseHelper::creatingFail();
        return ResponseHelper::operationSuccess();

    }

    //Delete book
    public function destroy($id)
    {
        $book = $this->book->find($id);
        if (!$book)
            return ResponseHelper::DataNotFound();
        $deleted = $book->delete();
        if (!$deleted)
            return ResponseHelper::deletingFail();
        return ResponseHelper::delete();
    }


}
