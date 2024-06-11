@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_pegawai_detail', $pegawai)}}
@endsection
@section('pegawai', 'active')
@section('main', 'show')
@section('content')
    <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
                <h4>
                    <strong>Data Pegawai</strong>
                </h4>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 NIP
                            </label>
                            <label>:</label>
                            {{ $pegawai->nip }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Nama Pegawai
                            </label>
                            <label>:</label>
                            {{ $pegawai->nama_pegawai }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Tempat Lahir
                            </label>
                            <label>:</label>
                            {{ $pegawai->tempat_lhr }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Tanggal Lahir
                            </label>
                            <label>:</label>
                            {{ $pegawai->tgl_lhr }}
                        </div><div class="form-group">
                            <label class="font-weight-bold">
                                 No HP
                            </label>
                            <label>:</label>
                            {{ $pegawai->no_hp }}
                        </div><div class="form-group">
                            <label class="font-weight-bold">
                                 Email
                            </label>
                            <label>:</label>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Alamat
                            </label>
                            <label>:</label>
                            {{ $pegawai->alamat }}     
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Jabatan
                            </label>
                            <label>:</label>
                            {{ $jabatan->nama_jabatan }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Pangkat/Golongan
                            </label>
                            <label>:</label>
                            {{ $golongan->golongan }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Pendidikan
                            </label>
                            <label>:</label>
                            {{ $pegawai->pendidikan }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Jurusan
                            </label>
                            <label>:</label>
                            {{ $pegawai->jurusan }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Diklat Pimpinan
                            </label>
                            <label>:</label>
                            {{ $pegawai->diklat_pim }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Tahun Lulus
                            </label>
                            <label>:</label>
                            {{ $pegawai->thn_lulus }}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Unit Kerja
                            </label>
                            <label>:</label>
                            {{ $pegawai->uker }}
                        </div>
                    </div>
                </div>

               <div class="d-flex justify-content-end">
                  <a href="{{ route('pegawai.index') }}" class="btn btn-warning mx-1" role="button">
                     Kembali
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection