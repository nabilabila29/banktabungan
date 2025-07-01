<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'email', 'telepon', 'alamat'];

    public function rekening()
    {
        return $this->hasOne(Rekening::class);
    }
}
