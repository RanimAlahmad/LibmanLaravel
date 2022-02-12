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
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'picture'=>['required' , 'image'],
            'brief' =>['required', 'string']
        ];
    }
}
