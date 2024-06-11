<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganGajiPokok extends Model
{
    use HasFactory;

    protected $table = 'detail_potongan_gaji_pokoks';
    protected $fillable = ['gaji_pokok_id', 'bjb', 'mukti_resik', 'kopri', 'bjbs', 'al_madinah'];

    public function gaji_pokok(){
        return $this->belongsTo(GajiPokok::class, 'gaji_pokok_id');
    }
}
