<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [,
            'picture'=>['required' , 'image'],'required', 'regex:/^[a-zA-Z\s]+$/']
            'brief' =>['required', 'string']
        ];
    }
}
