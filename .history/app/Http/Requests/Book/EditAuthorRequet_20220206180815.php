<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class EditAuthorRequet extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
