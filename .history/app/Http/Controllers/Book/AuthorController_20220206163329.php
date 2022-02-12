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
        $image = $request->file('pic');
        if($request->hasFile('image')){
            $name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'),$name);
            return response()->json($name);
        }
        else{return response()->json('null');}


}
}
