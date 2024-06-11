<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jabatan', 'jenis_jabatan', 'eselon', 'tmt_jabatan'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'jabatan_id');
    }
}
