<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Tambahkan ini untuk menggunakan Rule::in()

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Atau sesuaikan dengan otorisasi Anda
    }

    public function rules()
    {
        return [
            'name'           => 'required|string|max:255', // Nama harus diisi, berupa string, maksimal 255 karakter
            'address'        => 'required|string',       // Alamat harus diisi, berupa string
            'city'           => 'required|string',       // Kota harus diisi, berupa string
            'zip'            => 'required|digits:5',    // Kode Pos harus diisi, berupa 5 digit angka
            'status'         => [
                'required',
                Rule::in(['pending', 'confirmed', 'done']), // Status harus salah satu dari nilai ini
            ],
            'payment_status' => [
                'required',
                Rule::in(['pending', 'success', 'failed', 'expired']), // Status pembayaran harus salah satu dari nilai ini
            ],
        ];
    }
}
