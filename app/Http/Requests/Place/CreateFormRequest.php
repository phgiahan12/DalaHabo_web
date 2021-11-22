<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'address' => 'unique:places'
        ];
    }

    public function messages() : array {
        return [
            'address.unique' => 'Địa điểm đã tồn tại'
        ];
    }
}
