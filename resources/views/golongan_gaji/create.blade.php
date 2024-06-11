@extends('layouts.dashboard')

@section('breadcrumbs')
    {{Breadcrumbs::render('dashboard_golongan_gaji_create')}}
@endsection
@section('golongan_gaji', 'active')
@section('main', 'show')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('golongan-gaji.store')}}" method="POST">
                        @csrf
                        <!-- golongan -->
                        <div class="form-group">
                            <label for="input_golongan" class="font-weight-bold">
                                Pangkat/Golongan
                            </label>
                            <input id="input_golongan" value="{{old('golongan')}}" name="golongan" type="text" class="form-control @error('golongan') is-invalid @enderror" placeholder="Input Golongan" />
                            @error('golongan')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- nominal_gaji_pokok -->
                        <div class="form-group">
                            <label for="input_nominal_gaji_pokok" class="font-weight-bold">
                                Nominal Gaji 
                            </label>
                            <input id="input_nominal_gaji_pokok" value="{{old('nominal_gaji_pokok')}}" name="nominal_gaji_pokok" type="text" class="form-control @error('nominal_gaji_pokok') is-invalid @enderror" placeholder="Input Nominal Gaji" />
                            @error('nominal_gaji_pokok')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- nominal_gaji_ttp -->
                        <div class="form-group">
                            <label for="input_nominal_gaji_ttp" class="font-weight-bold">
                                Nominal TPP
                            </label>
                            <input id="input_nominal_gaji_ttp" value="{{old('nominal_gaji_ttp')}}" name="nominal_gaji_ttp" type="text" class="form-control @error('nominal_gaji_ttp') is-invalid @enderror" placeholder="Input Nominal TTP" />
                            @error('nominal_gaji_ttp')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- tmt_golongan -->
                        <div class="form-group">
                            <label for="input_tmt_golongan" class="font-weight-bold">
                                TMT Golongan
                            </label>
                            <input id="input_tmt_golongan" value="{{old('tmt_golongan')}}" name="tmt_golongan" type="date" class="form-control @error('tmt_golongan') is-invalid @enderror" placeholder="Input TMT Golongan" />
                            @error('tmt_golongan')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="float-right">
                            <a class="btn btn-warning px-3" href="{{route('golongan-gaji.index')}}">Kembali</a>
                            <button type="submit" class="btn btn-info px-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

