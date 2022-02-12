<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Book\ViewAuthors;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;


class AuthorController extends Controller
{
    private $author;

    public function __construct(A $user)
    {
        $this->user = $user;
    }
}
