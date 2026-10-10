<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nama' => ['required', 'string', 'max:255',],
        'harga' => ['required', 'decimal', 'min:0',],
        'stok' => ['required', 'numeric', 'min:0',],
        'deskripsi' => ['nullable', 'string', 'max:255',],
        ];
    }
}
