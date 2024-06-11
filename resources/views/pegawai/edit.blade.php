@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_pegawai_edit', $pegawai)}}
@endsection
@section('pegawai', 'active')
@section('main', 'show')
@section('content')
<div class="row">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
                <form action="{{ route('pegawai.update', ['pegawai' => $pegawai]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <!-- nip -->
                            <div class="form-group">
                                <label for="input_pegawai_nip" class="font-weight-bold">
                                    NIP
                                </label>
                                <input id="input_pegawai_nip" value="{{old('nip', $pegawai->nip)}}" name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Input NIP"/>
                                <!-- error message -->
                                @error('nip')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- name -->
                            <div class="form-group">
                                <label for="input_pegawai_nama" class="font-weight-bold">
                                    Nama Pegawai
                                </label>
                                <input id="input_pegawai_nama" value="{{old('nama_pegawai', $pegawai->nama_pegawai)}}" name="nama_pegawai" type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Input Nama Pegawai" />
                                <!-- error message -->
                                @error('nama_pegawai')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- tempat_lahir -->
                            <div class="form-group">
                                <label for="input_pegawai_tempat_lhr" class="font-weight-bold">
                                    Tempat lahir
                                </label>
                                <input id="input_pegawai_tempat_lhr" value="{{old('tempat_lhr', $pegawai->tempat_lhr)}}" name="tempat_lhr" type="text" class="form-control @error('tempat_lhr') is-invalid @enderror" placeholder="Input Tempat Lahir" />
                                <!-- error message -->
                                @error('tempat_lhr')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- tgl_lhr -->
                            <div class="form-group">
                                <label for="input_pegawai_tgl_lhr" class="font-weight-bold">
                                    Tanggal Lahir
                                </label>
                                <input id="input_pegawai_tgl_lhr" value="{{old('tgl_lhr', $pegawai->tgl_lhr)}}" name="tgl_lhr" type="date" class="form-control @error('tgl_lhr') is-invalid @enderror" placeholder="Input Tanggal Lahir" />
                                <!-- error message -->
                                @error('tgl_lhr')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- no_hp -->
                            <div class="form-group">
                                <label for="input_pegawai_no_hp" class="font-weight-bold">
                                    No HP
                                </label>
                                <input id="input_pegawai_no_hp" value="{{old('no_hp', $pegawai->no_hp)}}" name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Input No HP" />
                                <!-- error message -->
                                @error('no_hp')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- alamat -->
                            <div class="form-group">
                                <label for="input_pegawai_alamat" class="font-weight-bold">
                                    Alamat
                                </label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Input Alamat">{{old('alamat', $pegawai->alamat)}}</textarea>
                                <!-- error message -->
                                @error('alamat')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- jabatan -->
                            <div class="form-group">
                                <label for="input_pegawai_jabatan" class="font-weight-bold">
                                    Jabatan
                                </label>
                                <select id="select_jabatan" name="jabatan" data-placeholder="Pilih Jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                @if (old('jabatan', $jabatanSelected->id))
                                    <option value="{{ $jabatanSelected->id }}" selected>{{ $jabatanSelected->nama_jabatan }}</option>
                                @endif
                                </select>
                                <!-- error message -->
                                @error('jabatan')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- golongan_gaji -->
                            <div class="form-group">
                                <label for="input_pegawai_golongan_gaji" class="font-weight-bold">
                                    Pangkat/Golongan
                                </label>
                                <select id="select_golongan_gaji" name="golongan_gaji" data-placeholder="Pilih Pangkat/Golongan" class="form-control @error('golongan_gaji') is-invalid @enderror">
                                @if (old('golongan_gaji', $golonganSelected->id ))
                                    <option value="{{ $golonganSelected->id }}" selected>{{ $golonganSelected->golongan }}</option>
                                @endif
                                </select>
                                <!-- error message -->
                                @error('golongan_gaji')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- pendidikan -->
                            <div class="form-group">
                                <label for="input_pegawai_pendidikan" class="font-weight-bold">
                                    Pendidikan
                                </label>
                                <input id="input_pegawai_pendidikan" value="{{old('pendidikan' , $pegawai->pendidikan)}}" name="pendidikan" type="text" class="form-control @error('pendidikan') is-invalid @enderror" placeholder="Input Pendidikan"/>
                                <!-- error message -->
                                @error('pendidikan')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- jurusan -->
                            <div class="form-group">
                                <label for="input_pegawai_jurusan" class="font-weight-bold">
                                    Jurusan
                                </label>
                                <input id="input_pegawai_jurusan" value="{{old('jurusan', $pegawai->jurusan)}}" name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Input Jurusan" />
                                <!-- error message -->
                                @error('jurusan')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- diklat_pim -->
                            <div class="form-group">
                                <label for="input_pegawai_diklat_pim" class="font-weight-bold">
                                    Diklat Pimpinan
                                </label>
                                <input id="input_pegawai_diklat_pim" value="{{old('diklat_pim', $pegawai->diklat_pim)}}" name="diklat_pim" type="text" class="form-control @error('diklat_pim') is-invalid @enderror" placeholder="Input Diklat Pimpinan"/>
                                <!-- error message -->
                                @error('diklat_pim')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- thn_lulus -->
                            <div class="form-group">
                                <label for="input_pegawai_thn_lulus" class="font-weight-bold">
                                    Tahun Lulus
                                </label>
                                <input id="input_pegawai_thn_lulus" value="{{old('thn_lulus', $pegawai->thn_lulus)}}" name="thn_lulus" type="text" class="form-control @error('thn_lulus') is-invalid @enderror" placeholder="Input Tahun Lulus" />
                                <!-- error message -->
                                @error('thn_lulus')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- uker -->
                            <div class="form-group">
                                <label for="input_pegawai_uker" class="font-weight-bold">
                                    Unit Kerja
                                </label>
                                <input id="input_pegawai_uker" value="{{old('uker', $pegawai->uker)}}" name="uker" type="text" class="form-control @error('uker') is-invalid @enderror" placeholder="Input Unit Kerja"/>
                                <!-- error message -->
                                @error('uker')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- user -->
                            <div class="form-group">
                                <label for="input_pegawai_user" class="font-weight-bold">
                                    User
                                </label>
                                <select id="select_user" name="user" data-placeholder="Pilih User" class="form-control @error('user') is-invalid @enderror">
                                @if (old('user', $userSelected->id))
                                    <option value="{{ $userSelected->id }}" selected>{{ $userSelected->email }}</option>
                                @endif
                                </select>
                                <!-- error message -->
                                @error('user')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>
                   
                    <div class="float-right">
                        <a class="btn btn-warning px-3 mx-2" href="{{ route('pegawai.index') }}">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success float-right px-3">
                            Ubah
                        </button>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{asset('template/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/select2/css/select2-bootstrap5.min.css')}}">
@endpush

@push('javascript-external')
    <script src="{{asset('template/select2/js/select2.min.js')}}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function (){
            //select jabatan
            $('#select_jabatan').select2({
                theme: 'bootstrap5',
                language: "",
                allowClear: true,
                ajax: {
                    url: "{{route('jabatan.select')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_jabatan,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            //select golongan_gaji
            $('#select_golongan_gaji').select2({
                theme: 'bootstrap5',
                language: "",
                allowClear: true,
                ajax: {
                    url: "{{route('golongan_gaji.select')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.golongan,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            //select user
            $('#select_user').select2({
                theme: 'bootstrap5',
                language: "",
                allowClear: true,
                ajax: {
                    url: "{{route('user.select')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.email,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

        });
    </script>
@endpush
