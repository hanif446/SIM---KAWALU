@extends('layouts.home')
@section('content')
    <div class="jumbotron position-relative d-flex flex-column overflow-hidden">
        <article>
            <h1>KECAMATAN KAWALU</h1>
            <br>
            <h3>"Bordir, Bersahaja, Objektif, Responsif, Dedikatif, Ikhlas, dan Ramah"</h3>
            <h4>  Jl. Raya Cibeuti No.80, Cibeuti, Kawalu, Tasikmalaya, Jawa Barat 46182</h4>
        </article>
    </div>
    <div id="tentang-kami" class="main-content">
        <div class="flex-h">
            <article class="intro">
                <h1>Selamat datang di Aplikasi Slip Gaji Pegawai Kecamatan Kawalu</h1>
                <p align="justify">Aplikasi Slip Gaji merupakan aplikasi berupa sebuah website yang menyediakan informasi terkait gaji para pegawai yang berada di Kecamatan Kawalu Tasikmalaya. Dengan adanya aplikasi website ini diharapkan para pegawai dapat mendapatkan informasi secara cepat dan mudah.</p>
            </article>

            <div class="flex-h intro-img">
                <div class="img-container">
                    <img src="{{asset('template2/assets/img/gambar-1.png')}}" class="featured-img">
                </div>
                <div class="img-container ml-50">
                    <img src="{{asset('template2/assets/img/gambar-2.bmp')}}" class="featured-img">
                </div>
            </div>
        </div>
    </div>

    <div id="profil" class="main-content bg-grey">
        <div class="title">
            <h1>Visi dan Misi</h1>
        </div>
        <div class="flex-v">
            <div class="flex-h mt-50 space-between">
                <div class="card-visi flex-v">
                    <h2>Visi</h2>
                    <p>KECAMATAN KAWALU MENGEDEPANKAN PROFESIONALITAS PELAYAN YANG BERBASIS PARTISIATIF DALAM MEWUJUDKAN PENINGKATAN KEMANDIRIAN PEREKONOMIAN</p>
                </div>
            </div>
            <div class="flex-h mt-50 space-between">
                <div class="card-misi flex-v">
                    <h2>Misi</h2>
                    <p>1. Meningkatkan Kinerja Pelayanan Kantor Kecamatan Kawalu yang Berorientasi Pada Kualitas dan Profesionalitas</p>
                    <p>2. Mewujudkan Masyarakat yang Tertib, Rukun, Adil, dan Sejahtera</p>
                    <p>3. Mewujudkan Masyarakat yang Partisiatif dalam Pembangunan</p>
                    <p>4. Meningkatkan Pemberdayaan Masyarakat yang Berbasis Lingkungan</p>
                </div>
            </div>
        </div>
    </div>

@endsection