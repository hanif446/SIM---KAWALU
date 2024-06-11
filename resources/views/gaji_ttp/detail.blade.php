@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_gaji_ttp_detail', $gaji_ttp)}}
@endsection
@section('gaji_ttp', 'active')
@section('main_gaji', 'show')
@section('content')
    <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
                <h4>
                    <strong>Gaji TTP Pegawai</strong>
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
                            {{ $gaji_ttp->bulan_gaji}} {{ $gaji_ttp->tahun_gaji}}
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
                                 Nominal TTP
                            </label>
                            <label>:</label>
                            Rp. {{number_format($golongan_gaji->nominal_gaji_ttp, 0, ',', '.')}}
                        </div>
                        <div>
                            <p><b>Potongan-Potongan</b></p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Infak
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_ttp->infak , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 BJB
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_ttp->bjb , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Mukti Resik
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_ttp->mukti_resik , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 BJBS
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_ttp->bjbs , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Al-Madinah
                            </label>
                            <label>:</label>
                            Rp. {{number_format($potongan_gaji_ttp->al_madinah , 0, ',', '.')}}
                        </div>
                        <hr style="color: black;width: 100%;size: 100%;noshade;">
                         <div class="form-group">
                            <label class="font-weight-bold">
                                 Jumlah Potongan
                            </label>
                            <label>:</label>
                            Rp. {{number_format($gaji_ttp->jml_pot , 0, ',', '.')}}
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">
                                 Gaji Bersih
                            </label>
                            <label>:</label>
                            Rp. {{number_format($gaji_ttp->gaji_netto , 0, ',', '.')}}
                        </div>
                    </div>
                </div>

               <div class="d-flex justify-content-end">
                  <a href="{{ route('gaji-ttp.index') }}" class="btn btn-warning mx-1" role="button">
                     Kembali
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection