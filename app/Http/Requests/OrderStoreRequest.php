<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'email' => 'required|email|max:120|confirmed',
            'email_confirmation' => 'required|max:120',
            'full_name' => 'required|max:80|alpha_spaces',
            'phone' => 'min:8|max:12|nullable',
            'postal_code' => 'required|min:4',
            'house_number' => 'required|max:10',
            'street' => 'required|alpha_spaces|max:150',
            'residence' => 'required|alpha_spaces|max:150',
            'country' => 'required|max:80|alpha_spaces',
            'terms_end_conditions' => 'required',
            'privacy_policy' => 'required',
        ];
    }
}
