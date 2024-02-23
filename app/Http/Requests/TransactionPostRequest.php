<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'total' => ['required', 'numeric'],
            'paid' => ['required', 'numeric'],
        ];
    }
}
