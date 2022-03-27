<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserValidator
{

    /**
     * @var Request
     */
    private $request;

    public function _construct(Request $request)
    {
        $this->request = $request;
    }

    Public function validate()
    {
        return Validator::make($this->request->all(), $this->rules(), $this->messages());
    }

    private function rules()
    {
        return [
            "firstname" => "required",
            "lastname" => "required",
            "document_type" => "required",
            "document_number" => "required|unique:users,document_number," . $this->request->id,
            "email" => "required|email|unique:user,email," . $this->request->id;
            "password" => "required",
            "confirm_password" => "required|same:password",
            "phone" => "required"
        ];
    }

    private function messages()
    {
        return [];
    }
}