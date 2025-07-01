<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NasabahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $nasabahId = $this->route('nasabah');

        return [
            'nama' => 'required|string|max:100|min:2',
            'nik' => [
                'required',
                'string',
                'size:16',
                'regex:/^[0-9]{16}$/',
                Rule::unique('nasabahs', 'nik')->ignore($nasabahId),
            ],
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('nasabahs', 'email')->ignore($nasabahId),
            ],
            'telepon' => [
                'required',
                'regex:/^(\+62|08)[0-9]{8,13}$/',
            ],
            'alamat' => 'required|string|max:500|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.min' => 'Nama minimal 2 karakter.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            
            'nik.required' => 'NIK wajib diisi.',
            'nik.size' => 'NIK harus tepat 16 digit.',
            'nik.regex' => 'NIK hanya boleh berisi angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 100 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.regex' => 'Format nomor telepon tidak valid. Gunakan format +62 atau 08 diikuti angka.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal 10 karakter.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'nama lengkap',
            'nik' => 'NIK',
            'email' => 'email',
            'telepon' => 'nomor telepon',
            'alamat' => 'alamat',
        ];
    }
}
