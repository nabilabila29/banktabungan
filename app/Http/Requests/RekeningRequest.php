<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RekeningRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jenis' => 'required|in:tabungan,giro,deposito',
            'setor_awal' => 'required|numeric|min:100000|max:999999999999',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nasabah_id.required' => 'Pilih nasabah terlebih dahulu.',
            'nasabah_id.exists' => 'Nasabah yang dipilih tidak ditemukan.',
            
            'jenis.required' => 'Jenis rekening wajib dipilih.',
            'jenis.in' => 'Jenis rekening tidak valid.',
            
            'setor_awal.required' => 'Saldo awal wajib diisi.',
            'setor_awal.numeric' => 'Saldo harus berupa angka.',
            'setor_awal.min' => 'Saldo minimal Rp 100.000.',
            'setor_awal.max' => 'Saldo maksimal Rp 999.999.999.999.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'nasabah_id' => 'nasabah',
            'jenis' => 'jenis rekening',
            'setor_awal' => 'saldo awal',
        ];
    }
}
