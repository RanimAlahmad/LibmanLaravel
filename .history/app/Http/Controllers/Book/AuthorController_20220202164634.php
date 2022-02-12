<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Book\ViewAuthors;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;


class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    //show all authors
    public function index()
    {
         $users = $this->user->gettAllUsers();
        return  $this->response->returnData('all Users' , $users , 200);
    }

       //عرض مستخدم معين
       public function show($id)
       {
           $user = $this->user->find($id);
           if (!$user)
               return $this->response->returnError('this user is not found' , 400);
           return $this->response->returnData('user where id '. $id . ' is:' , $user , 200);
       }
}
