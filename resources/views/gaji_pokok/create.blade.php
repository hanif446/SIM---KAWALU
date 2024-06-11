@extends('layouts.dashboard')
@section('breadcrumbs')
{{Breadcrumbs::render('dashboard_gaji_pokok_create')}}
@endsection
@section('gaji_pokok', 'active')
@section('main_gaji', 'show')
@section('content')
<div class="row">
	   <div class="col-md-12">
	      <div class="card">
	         <div class="card-body">
	            <form action="{{ route('gaji-pokok.store') }}" method="POST">
	            	@csrf
	               <!-- pegawai -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     Pegawai
	                  </label>
	                  <select id="select_pegawai" name="pegawai" data-placeholder="Pilih Pegawai" class="custom-select w-100 @error('pegawai') is-invalid @enderror">
	                  @if (old('pegawai'))
	                  	<option value="{{ old('pegawai')->id }}" selected>{{ old('pegawai')->nip }} - {{ old('pegawai')->nama_pegawai }}</option>
	                  @endif

	                  </select>
	                  @error('pegawai')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>

	                <div class="row">
	                	<label for="input_pegawai_nip" class="font-weight-bold">
                            Bulan Gaji
                        </label>
                        <div class="col-md-6">
                            <!-- bulan -->
                            <div class="form-group">
                                <select style="cursor:pointer;" class="form-control @error('bulan_gaji') is-invalid @enderror" id="select_bulan_gaji" name="bulan_gaji" data-value="{{ old('bulan_gaji') }}">
								    <option value="" selected disabled> Pilih Bulan</option>
									<option value="Januari" {{ old('bulan_gaji') == 'Januari' ? 'selected=selected' : '' }}> Januari</option>
									<option value="Februari" {{ old('bulan_gaji') == 'Februari' ? 'selected=selected' : '' }}> Februari</option>
									<option value="Maret" {{ old('bulan_gaji') == 'Maret' ? 'selected=selected' : '' }}> Maret</option>
									<option value="April" {{ old('bulan_gaji') == 'April' ? 'selected=selected' : '' }}> April</option>
									<option value="Mei" {{ old('bulan_gaji') == 'Mei' ? 'selected=selected' : '' }}> Mei</option>
									<option value="Juni" {{ old('bulan_gaji') == 'Juni' ? 'selected=selected' : '' }}> Juni</option>
									<option value="Juli" {{ old('bulan_gaji') == 'Juli' ? 'selected=selected' : '' }}> Juli</option>
									<option value="Agustus" {{ old('bulan_gaji') == 'Agustus' ? 'selected=selected' : '' }}> Agustus</option>
									<option value="September" {{ old('bulan_gaji') == 'September' ? 'selected=selected' : '' }}> September</option>
									<option value="Oktober" {{ old('bulan_gaji') == 'Oktober' ? 'selected=selected' : '' }}> Oktober</option>
									<option value="November" {{ old('bulan_gaji') == 'November' ? 'selected=selected' : '' }}> November</option>
									<option value="Desember" {{ old('bulan_gaji') == 'Desember' ? 'selected=selected' : '' }}> Desember</option>
						  		</select>
                                <!-- error message -->
                                @error('bulan_gaji')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                            <!-- tahun -->
                            <div class="form-group">
                                <select style="cursor:pointer;" class="form-control @error('tahun_gaji') is-invalid @enderror"  name="tahun_gaji">
									<option value="0" selected disabled> Pilih Tahun</option>
									
									 {{$year = date('Y')}}
									 {{$min = $year - 20}}
									 {{$max = $year + 20}}
									 @for( $i=$max; $i>=$min; $i-- ) 
									 	<option value="{{$i}}" {{ old('tahun_gaji') == $i ? "selected" : null}}>{{$i}}</option>
									 @endfor
								
							    </select>
                                <!-- error message -->
                                @error('tahun_gaji')
                                  <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                           </div>
                        </div>
                    </div>

	               <!-- bjb -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     BJB
	                  </label>
	                  <input name="bjb" type="text" class="form-control @error('bjb') is-invalid @enderror" value="{{ old('bjb') }}" placeholder="Input BJB"/>
	                  @error('bjb')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>

	               <!-- mukti_resik -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     Mukti Resik
	                  </label>
	                  <input name="mukti_resik" type="text" class="form-control @error('mukti_resik') is-invalid @enderror" value="{{ old('mukti_resik') }}" placeholder="Input Mukti Resik"/>
	                  @error('mukti_resik')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>

	               <!-- kopri -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     Kopri
	                  </label>
	                  <input name="kopri" type="text" class="form-control @error('kopri') is-invalid @enderror" value="{{ old('kopri') }}" placeholder="Input Kopri"/>
	                  @error('kopri')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>

	               <!-- bjbs -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     BJBS
	                  </label>
	                  <input name="bjbs" type="text" class="form-control @error('bjbs') is-invalid @enderror" value="{{ old('bjbs') }}" placeholder="Input BJBS"/>
	                  @error('bjbs')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>

	               <!-- al-madinah -->
	               <div class="form-group">
	                  <label class="font-weight-bold">
	                     Al-Madinah
	                  </label>
	                  <input name="al_madinah" type="text" class="form-control @error('al_madinah') is-invalid @enderror" value="{{ old('al_madinah') }}" placeholder="Input Al-Madinah"/>
	                  @error('al_madinah')
		                  <span class="invalid-feedback">
		                 	<strong>
		                 		{{$message}}
		                 	</strong> 	
		                  </span>
	                  @enderror
	               </div>
	               
	               <div class="float-right">
	                  <a href="{{ route('gaji-pokok.index') }}" class="btn btn-warning px-3 mx-2" href="">
	                     Kembali
	                  </a>
	                  <button type="submit" class="btn btn-info float-right px-3">
	                     Simpan
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
                
                //select pegawai
                $('#select_pegawai').select2({
                    theme: 'bootstrap5',
                    language: "",
                    allowClear: true,
                    ajax: {
                        url: "{{route('pegawai.select')}}",
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: [item.nip + " - " + item.nama_pegawai],
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
