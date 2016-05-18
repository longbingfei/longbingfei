<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateAuthRequest extends Request
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
            'username' => 'min:2|max:12',
            'name' => 'min:2|max:8',
            'password' => 'min:1|max:10',
        ];
    }
}
