<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $fillable = ['nasabah_id', 'jenis', 'setor_awal'];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
