<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_buku' => ['required', 'string', 'max:20',
                Rule::unique('bukus', 'kode_buku')->ignore($this->route('buku'))],
            'judul'     => ['required', 'string', 'min:3', 'max:200'],
            'penulis'   => ['required', 'string', 'max:100'],
            'stok'      => ['required', 'integer', 'min:0'],
            'kategori'  => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_buku.required' => 'Kode buku wajib diisi.',
            'kode_buku.unique'   => 'Kode buku sudah digunakan.',
            'judul.required'     => 'Judul buku wajib diisi.',
            'judul.min'          => 'Judul buku tidak boleh kurang dari 3 karakter.',
            'penulis.required'   => 'Penulis wajib diisi.',
            'stok.required'      => 'Stok wajib diisi.',
            'stok.integer'       => 'Stok harus berupa angka.',
            'stok.min'           => 'Stok tidak boleh negatif.',
            'kategori.required'  => 'Kategori wajib diisi.',
        ];
    }
}