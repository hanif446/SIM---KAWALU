<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([

                [
                    'nama_jabatan' => 'Sekretaris Kecamatan Kawalu',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'III.b',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Kepala Sub Bagian Perencanaan, Evaluasi, Pelaporan Dan Keuangan',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.b',
                    'tmt_jabatan' => '2020-01-02',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
                [
                    'nama_jabatan' => 'Kepala Sub Bagian Umum Dan Kepegawaian',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.b',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Kepala Seksi Ketentraman Dan Ketertiban Umum',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Kepala Seksi Kesejahteraan Rakyat',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Kepala Seksi Ekonomi Pembangunan',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Kepala Seksi Pemerintahan, Ketentraman Dan Ketertiban Umum',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Cibeuti',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Cilamajang',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Gununggede',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Gunungtandala',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Karanganyar',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Karsamenak',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'nama_jabatan' => 'Lurah Leuwiliang',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Lurah Tanjung',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Lurah Talagasari',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Lurah Urug',
                    'jenis_jabatan' => 'Jabatan Struktural',
                    'eselon' => 'IV.a',
                    'tmt_jabatan' => '2022-08-30',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Pengelola Keamanan Dan Ketertiban',
                    'jenis_jabatan' => 'Jabatan Umum',
                    'eselon' => '-',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Pengolah Data Pelayanan Kelurahan',
                    'jenis_jabatan' => 'Jabatan Umum',
                    'eselon' => '-',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Pengadministrasi Umum (Di Kelurahan)',
                    'jenis_jabatan' => 'Jabatan Umum',
                    'eselon' => '-',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Pengelola Sarana Dan Prasarana Rumah Tangga',
                    'jenis_jabatan' => 'Jabatan Umum',
                    'eselon' => '-',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_jabatan' => 'Bendahara Kecamatan Kawalu',
                    'jenis_jabatan' => 'Jabatan Umum',
                    'eselon' => '-',
                    'tmt_jabatan' => '2017-01-03',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
        ]);
    }
}
