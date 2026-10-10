<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nama' => ['required', 'string', 'max:255',],
        'harga' => ['required', 'numeric',],
        'stok' => ['required', 'integer', 'min:0',],
        'deskripsi' => ['nullable', 'string', 'max:255',],
        ];
    }
}
