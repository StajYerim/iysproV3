<?php

namespace App\Http\Requests\Modules\Sales;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
    public function messages()
    {
        return [
            'description.required'    => 'A title is required.',
        ];
    }


    public function rules()
    {
        return [
            'description' => 'required',
        ];
    }

}
