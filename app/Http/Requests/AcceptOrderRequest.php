<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'order_id' => ['required', 'integer', function ($attribute, $value, $fail) {
                $shop = auth()->user()->shop;
                if (!$shop || !$shop->orders()->find($value)) $fail($attribute.' is invalid.');
            }],
        ];
    }
}
