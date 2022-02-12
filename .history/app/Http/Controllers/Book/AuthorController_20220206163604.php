<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Author;

class AuthorController extends Controller
{
    public $author;
    public function __construct(Author $author){
        $this->author = $author;
    }

    public function store(Request $request){
        $image = $request->file('picture');
        if($request->hasFile('picture')){
            $name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/BookImages'),$name);
            return response()->json($name);
        }
        else{return response()->json('null');}


}
}
