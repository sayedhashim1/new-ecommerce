<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shippingSettingRequest extends FormRequest
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
            'value'=>'required',
            'plain_value'=>'numeric|nullable'
        ];
    }

    public function messages()
    {
       return[
           'value.required'=>'حقل الاسم مطلوب',
           'plain_value.numeric'=>'الحقل لا يقبل غير الارقام'
       ];
    }
}
