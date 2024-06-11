<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganGaji extends Model
{
    use HasFactory;

    protected $fillable = ['golongan', 'nominal_gaji_pokok', 'nominal_gaji_ttp', 'tmt_golongan'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'golongan_id');
    }
}
