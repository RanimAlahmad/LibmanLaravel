<?php


namespace App\Http\Requests\User;


use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

//Ranim
class RegisterRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'username' => ['nullable', 'string'],
            'phone' => ['required', 'string', new Phone()],


        ];
    }
}
