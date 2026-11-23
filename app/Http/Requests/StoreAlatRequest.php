<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode'    => ['required', 'string', 'max:20',
                Rule::unique('alats', 'kode')->ignore($this->route('alat'))],
            'nama'    => ['required', 'string', 'min:3', 'max:100'],
            'stok'    => ['required', 'integer', 'min:0'],
            'lokasi'  => ['nullable', 'string', 'max:100'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.unique'   => 'Kode alat sudah dipakai.',
            'nama.required' => 'Nama alat wajib diisi.',
            'nama.min'      => 'Nama alat tidak boleh kurang dari 3 karakter.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer'  => 'Stok harus berupa angka.',
            'stok.min'      => 'Stok tidak boleh negatif.',
        ];
    }
}