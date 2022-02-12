<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

// Mais Mahrouseh
class AddCategorieRequet extends FormRequest
{

    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/' , Rule::unique:('categories')],
        ];
    }
}
