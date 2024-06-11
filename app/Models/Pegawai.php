<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nip', 'nama_pegawai', 'tempat_lhr', 'tgl_lhr', 'no_hp', 'alamat', 'golongan_id', 'jabatan_id', 'pendidikan', 'jurusan', 'diklat_pim', 'thn_lulus', 'uker'];

    /*public function scopeSearch($query, $nama_pegawai)
    {
        return $query->where('nama_pegawai',"LIKE", "%{$nama_pegawai}%");
    }*/

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function golongan_gaji(){
        return $this->belongsTo(GolonganGaji::class, 'golongan_id');
    }

    public function gaji_pokok()
    {
        return $this->hasOne(GajiPokok::class, 'gaji_pokok_id');
    }

    public function gaji_ttp()
    {
        return $this->hasOne(GajiTTP::class, 'gaji_ttp_id');
    }

}
