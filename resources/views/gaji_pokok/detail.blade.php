@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_gaji_pokok_detail', $gaji_pokok)}}
@endsection
@section('gaji_pokok', 'active')
@section('main_gaji', 'show')
@section('content')
    <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
                <h4>
                    <strong>Gaji Pegawai</strong>
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
                                 Bulan Gaji
                            </label>
                            <label>:</label>
                            {{ $gaji_pokok->bulan_gaji}} {{ $gaji_pokok->tahun_gaji}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Pangkat/Golongan
                            </label>
                            <label>:</label>
                            {{ $golongan_gaji->golongan }}
                        </div>
                    </div>

                    
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Nominal Gaji
                            </label>
                            <label>:</label>
                            Rp. {{number_format($golongan_gaji->nominal_gaji_pokok, 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <p><b>Potongan-Potongan :</b></p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 BJB
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_pokok->bjb , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Mukti Resik
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_pokok->mukti_resik , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Kopri
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_pokok->kopri , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 BJBS
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_pokok->bjbs , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Al-Madinah
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_pokok->al_madinah , 0, ',', '.')}}
                        </div>
                        <hr style="color: black;width: 100%;size: 100%;noshade;">
                         <div class="form-group">
                            <label class="font-weight-bold">
                                 Jumlah Potongan
                            </label>
                            <label>:</label>
                            Rp. {{number_format($gaji_pokok->jml_pot , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Gaji Bersih
                            </label>
                            <label>:</label>
                            Rp. {{number_format($gaji_pokok->gaji_netto , 0, ',', '.')}}
                        </div>
                    </div>
                </div>

               <div class="d-flex justify-content-end">
                  <a href="{{ route('gaji-pokok.index') }}" class="btn btn-warning mx-1" role="button">
                     Kembali
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection