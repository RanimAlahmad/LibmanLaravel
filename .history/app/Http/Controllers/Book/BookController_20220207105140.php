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
    public $book;
    
    public function __construct(Book $author ,BookAuthor $bookAuthor ,Categorie $categorie, BookCategorie $bookCategorie ){
        $this->author = $author;
    }
}
