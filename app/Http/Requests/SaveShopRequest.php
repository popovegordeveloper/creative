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
        $rules = [
            'name' => 'required',
            'description_preview' => 'required',
            'logo' => 'required_without:logo_exist|image',
            'cover' => 'required_without:cover_exist|image',
            'city' => 'required|string',
            'master_logo' => 'required_without:master_logo_exist|image',
            'master_name' => 'required|string',
            'master_phone' => 'required|numeric',
        ];

        if (!$this->request->has('logo_exist')) $rules['slug'] = 'required|unique:shops,slug';

        return $rules;
    }
}
