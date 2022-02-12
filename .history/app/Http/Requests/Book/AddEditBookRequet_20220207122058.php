<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class AddEditBookRequet extends FormRequest
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
            'price' => ['required','numric','between:1.0,10.0'],
        ];
    }
}
