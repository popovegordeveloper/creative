<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'product_id' => Rule::in(auth()->user()->shop->products->pluck('id')->toArray()),
            'photos' => 'required_without:loaded_photos',
            'name' => 'required',
            'description' => 'required',
            'composition' => 'required',
            'price' => 'required|numeric',
            'qty' => 'numeric',
            'category_id' => 'required|numeric',
            'term_dispatch_id' => 'required|numeric',
        ];
    }
}
