<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function __construct(Book $author ,BookAuthor $bookAuthor ,Categorie $categorie, BookCategorie $bookCategorie ){
        $this->author = $author;
        $this->bookAuthor = $bookAuthor;
        $this->categorie = $categorie;
        $this->bookCategorie = $bookCategorie;
    }

    //View all books of a specific category


}
