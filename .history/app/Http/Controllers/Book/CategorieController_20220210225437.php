<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\AddCategorieRequet;
use App\Http\Requests\Book\EditCategorieRequet;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Categorie;

//Mais Mahrouseh
class CategorieController extends Controller
{
    public $categorie;
    public function __construct(Categorie $categorie){
        $this->categorie = $categorie;
    }

    //View all categories by latest category
    public function index()
     {
         $categories = $this->categorie->getData();
         if(!$categories)
           return ResponseHelper::serverError();
         return ResponseHelper::select($categories);
     }

    //Add categorie
    public function store(AddCategorieRequet $request){
        $m = $request->validated();
        $created = $this->categorie->insertData($m);
        if(!$created)
          return ResponseHelper::creatingFail();
         return ResponseHelper::create($created);
    }
}
