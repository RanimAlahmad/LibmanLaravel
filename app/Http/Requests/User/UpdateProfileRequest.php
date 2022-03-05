<?php


namespace App\Http\Requests\User;


use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

//Ranim
class UpdateProfileRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'username' => ['string'],
            'lat'=>['numeric','min:0'],
            'lang'=>['numeric','min:0'],
        ];
    }


}
