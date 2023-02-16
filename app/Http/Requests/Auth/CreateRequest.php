<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class CreateRequest extends Request
{
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
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'address.address_line_1' => 'required|string',
            'address.address_line_2' => 'required|string',
            'address.city' => 'required|string',
            'address.state' => 'required|string',
            'address.country' => 'required|string',
            'address.zip' => 'required|string',
        ];
    }
}