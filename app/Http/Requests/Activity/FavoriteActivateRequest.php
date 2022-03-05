<?php


namespace App\Http\Requests\Activity;


use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

//Ranim
class FavoriteActivateRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'book_id' => ['required', 'integer', Rule::exists('books', 'id')->whereNull('deleted_at')],
        ];
    }


}
