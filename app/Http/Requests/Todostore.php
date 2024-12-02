<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Todostore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['max:25','required_without:completed'],
            'duedate' => ['date','after_or_equal:today','required_without:completed'],
            // 'duetime' => ['required'],
            'completed' => ['required_without:duedate','required_without:name']
        ];
    }
}
