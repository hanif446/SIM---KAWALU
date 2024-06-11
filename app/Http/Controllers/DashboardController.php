<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        $pegawais = DB::table('pegawais')->count();
        $jabatans = DB::table('jabatans')->count();
        $golongan_gajis = DB::table('golongan_gajis')->count();

        return view('dashboard.index', [
            'users' => $users,
            'pegawais' => $pegawais,
            'jabatans' => $jabatans,
            'golongan_gajis' => $golongan_gajis
        ]);
    }
}
