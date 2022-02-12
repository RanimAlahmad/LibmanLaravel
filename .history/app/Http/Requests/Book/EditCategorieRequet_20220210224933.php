<?php

namespace App\Http\Requests\Book;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

// Mais Mahrouseh
class EditCategorieRequet extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/' , use Illuminate\Validation\Rule;        ],
        ];
    }
}
