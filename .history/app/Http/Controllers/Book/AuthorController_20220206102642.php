<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Models\Author;

class AuthorController extends Controller
{
    public $user;
    public $response;

    public function __construct(User $user , myResponse $response){
        $this->user = $user;
        $this->response = $response;
    }
}
