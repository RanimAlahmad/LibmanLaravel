<?php


namespace App\Http\Requests\Order;


use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
//Ranim
class CreateOrderRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'order'=>['required','array'] ,
            'order.*.book_id' => ['required', 'integer', Rule::exists('books', 'id')->whereNull('deleted_at')],
            'order.*.quantity'=>['required','numeric','min:0'],
        ];
    }


}
