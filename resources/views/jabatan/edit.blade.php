@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_jabatan_edit', $jabatan)}}
@endsection
@section('jabatan', 'active')
@section('main', 'show')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('jabatan.update', ['jabatan' => $jabatan])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- nama_jabatan -->
                        <div class="form-group">
                            <label for="input_nama_jabatan" class="font-weight-bold">
                                Nama Jabatan
                            </label>
                            <input id="input_nama_jabatan" value="{{old('nama_jabatan', $jabatan->nama_jabatan)}}" name="nama_jabatan" type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" placeholder="Input Nama Jabatan" />
                            @error('nama_jabatan')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- jenis_jabatan -->
                        <div class="form-group">
                            <label for="input_jenis_jabatan" class="font-weight-bold">
                                Jenis Jabatan
                            </label>
                            <select id="select_jenis_jabatan" name="jenis_jabatan" data-placeholder="Pilih Jenis Jabatan" class="form-control @error('jenis_jabatan') is-invalid @enderror">
                              @foreach ($jenis_jabatan as $key => $value)
                                <option value="{{ $key }}" {{ old('jenis_jabatan', $jabatan->jenis_jabatan) == $key ? "selected" : null}}>{{ $value }}</option>
                              @endforeach
                            </select>
                            @error('jenis_jabatan')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- eselon -->
                        <div class="form-group">
                            <label for="input_eselon" class="font-weight-bold">
                                Eselon
                            </label>
                            <input id="input_eselon" value="{{old('eselon', $jabatan->eselon)}}" name="eselon" type="text" class="form-control @error('eselon') is-invalid @enderror" placeholder="Input Eselon" />
                            @error('eselon')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- tmt_jabatan -->
                        <div class="form-group">
                            <label for="input_tmt_jabatan" class="font-weight-bold">
                                TMT Jabatan
                            </label>
                            <input id="input_tmt_jabatan" value="{{old('tmt_jabatan', $jabatan->tmt_jabatan)}}" name="tmt_jabatan" type="date" class="form-control @error('tmt_jabatan') is-invalid @enderror" placeholder="Input TMT Jabatan" />
                            @error('tmt_jabatan')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="float-right">
                            <a class="btn btn-warning px-3" href="{{route('jabatan.index')}}">Kembali</a>
                            <button type="submit" class="btn btn-success px-3">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

