<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('golongan_gajis')->insert([

                [
                    'golongan' => 'Penata Tingkat I - III/d',
                    'nominal_gaji_pokok' => '25000',
                    'nominal_gaji_ttp' => '30000',
                    'tmt_golongan' => '2022-12-19',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'golongan' => 'Pembina - IV/a',
                    'nominal_gaji_pokok' => '20000',
                    'nominal_gaji_ttp' => '40000',
                    'tmt_golongan' => '2022-12-19',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
        ]);
    }
}
