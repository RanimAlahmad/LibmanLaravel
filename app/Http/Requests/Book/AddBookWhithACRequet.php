<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class AddBookWhithACRequet extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'picture'=>['required' , 'image'],
            'describe' =>['required', 'string'],
            'price' => ['required','numeric','between:0,99999'],
            'categories' => ['required','array','min:1'],
            'categories.*' => ['required','integer'],
            'authors' => ['required','array','min:1'],
            'authors.*' => ['required','integer'],
        ];
    }
}
