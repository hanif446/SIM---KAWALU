<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganGajiTTP extends Model
{
    use HasFactory;
    protected $table = 'detail_potongan_gaji_ttps';
    protected $fillable = ['gaji_ttp_id', 'infak', 'bjb', 'mukti_resik', 'bjbs', 'al_madinah'];

    public function gaji_ttp(){
        return $this->belongsTo(GajiTTP::class, 'gaji_ttp_id');
    }
}
