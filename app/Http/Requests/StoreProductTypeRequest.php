<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:producttype,name',
        ];
    }
    public function messages(){
        return[
            'required'=> ':attribute không được bỏ trống',
            'min'=>':attribute phải từ 2 kí tự trỏ lên',
            'max'=>':attribute tối đa có 255 kí tự',
            'unique'=>':attribute đã tồn tại sản phẩm này'
        ];
    }
    // custom lại attribute 
    public function attributes(){
        return [
            'name' => 'Tên loại sản phẩm',
        ];
    }
}
