<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveShopRequest extends FormRequest
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
            'name' => 'required',
            'description_preview' => 'required',
            'logo' => 'required|image',
            'cover' => 'required|image',
            'city' => 'required|string',
            'master_logo' => 'required|image',
            'master_name' => 'required|string',
            'master_phone' => 'required|numeric',
            'slug' => 'required|unique:shops',
        ];
    }
}
