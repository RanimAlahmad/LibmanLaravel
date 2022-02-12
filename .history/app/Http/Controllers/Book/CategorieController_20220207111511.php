<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public $categorie;
    public function __construct(Categorie $categorie){
        $this->author = $categorie;
    }
    //View all categories by latest category
    public function index()
     {
         $authors = $this->author->getData();
         return ResponseHelper::select($authors);
     }
}
