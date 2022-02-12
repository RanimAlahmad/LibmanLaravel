<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
// Mais Mahrouseh
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
            'price' => ['required','numeric','between:0,99999'],
        ];
    }
}
