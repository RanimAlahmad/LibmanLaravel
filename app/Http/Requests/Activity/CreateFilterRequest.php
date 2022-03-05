<?php


namespace App\Http\Requests\Activity;


use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
//ranim
class CreateFilterRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'lowPrice' => ['nullable', 'numeric', 'min:0'],
            'highPrice' => ['nullable', 'numeric', 'min:0'],
            'rate' => ['nullable', 'numeric', 'min:0'],
            'category'=>['nullable','array'] ,
            'category.*' => ['nullable', 'integer', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'author_id' => ['nullable', 'integer', Rule::exists('authors', 'id')->whereNull('deleted_at')]

        ];
    }
}
