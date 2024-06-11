<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pegawai;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@mail.test';
            $user->email_verified_at = now();
            $user->password = Hash::make('admin@');
            $user->remember_token = Str::random(10);
            $user->created_at = date("Y-m-d H:i:s");
            $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        $pegawai = new Pegawai();
            $pegawai->user_id = $user->id;
            $pegawai->nip = '198308202009011008';
            $pegawai->nama_pegawai = 'Dini Suandi';
            $pegawai->tempat_lhr = 'Tasikmalaya';
            $pegawai->tgl_lhr = '2002-01-23';
            $pegawai->no_hp = '089765432165';
            $pegawai->alamat = 'Tasikmalaya';
            $pegawai->golongan_id = '1';
            $pegawai->jabatan_id = '2';
            $pegawai->pendidikan = 'S1';
            $pegawai->jurusan = 'Ilmu Pemerintahan';
            $pegawai->diklat_pim = '-';
            $pegawai->thn_lulus = '2020';
            $pegawai->uker = 'Kecamatan Kawalu';
            $pegawai->created_at = date("Y-m-d H:i:s");
            $pegawai->updated_at = date("Y-m-d H:i:s");
        $pegawai->save();
    }
}
