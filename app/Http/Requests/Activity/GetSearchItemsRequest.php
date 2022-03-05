<?php


namespace App\Http\Requests\Activity;


use Kouja\ProjectAssistant\Bases\BaseFormRequest;
//ranim
class GetSearchItemsRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['string','required'],
        ];
    }


}
