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
            'name' => 'required',
            'image' => 'required',
            'address' => 'required|unique:places'
        ];
    }

    public function messages() : array {
        return [
            'name.required' => 'Chưa nhập tên địa điểm',
            'image.required' => 'Vui lòng thêm ít nhất 1 hình ảnh',
            'address.required' => 'Chưa nhập tên địa chỉ',
            'address.unique' => 'Địa điểm đã tồn tại'
        ];
    }
}
