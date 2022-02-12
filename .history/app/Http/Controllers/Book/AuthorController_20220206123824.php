<?php

namespace App\Http\Controllers;

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
        $image = $request->file('image');
        if($request->hasFile('image'));{
            $name = rand().'.'.$image->getClientOriginalExtension();
            $image = 
        }


}
}
