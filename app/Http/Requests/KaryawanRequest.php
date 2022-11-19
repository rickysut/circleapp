<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'handphone' => ['nullable', 'string'],
            'pob' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'dep_id' => ['required', 'integer'],
            'jabatan_id' => ['required', 'integer'],
            'doc_id' => ['nullable', 'integer'],
        ];
    }
}
