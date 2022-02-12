<?php
namespace App\Http\Requests\User;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

//Ranim
class LoginRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'phone' => ['required', 'string', new Phone()],
            'password' => ['required']
        ];
    }
}
