<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiPokok extends Model
{
    use HasFactory;

    protected $fillable = ['pegawai_id', 'bulan_gaji', 'tahun_gaji', 'jml_pot', 'gaji_netto'];

    /*public function scopeSearch($query, $tgl)
    {
        return $query->where('tgl',"LIKE", "%{$tgl}%");
    }*/

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function potongan_gaji_pokok()
    {
        return $this->hasOne(PotonganGajiPokok::class, 'gaji_pokok_id');
    }
}
