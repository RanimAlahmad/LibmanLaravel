<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Author;

class AuthorController extends Controller
{
    public $author;

    public function __construct(User $user , myResponse $response){
        $this->author = $author;
        $this->response = $response;
    }
}
