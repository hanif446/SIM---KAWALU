@extends('layouts.dashboard')
@section('breadcrumbs')
{{Breadcrumbs::render('dashboard_gaji_pokok')}}
@endsection
@section('gaji_pokok', 'active')
@section('main_gaji', 'show')
@section('content')
{{--    Message Alert --}}
@include('layouts.alert')
<div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                @can('gaji_pokok_pegawai_create')
                    <a href="{{route('gaji-pokok.create')}}" class="btn btn-success float-right" role="button">
                        Tambah Data
                        <i class="fas fa-plus-square"></i>
                    </a>
                @endcan
            </div>
            <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" width="10">No</th>
                                <th class="text-center">NIP Pegawai</th>
                                <th class="text-center">Nama Pegawai</th>
                                <th class="text-center">Bulan Gaji</th>
                                <th class="text-center">Gaji Bersih</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @forelse ($gaji_pokok as $gp)
                        <tr align="center">
                            <td align="center">{{ $no++ }}</td>
                            <td>{{ $gp->nip }}</td>
                            <td>{{ $gp->nama_pegawai}}</td>
                            <td>{{ $gp->bulan_gaji }} {{ $gp->tahun_gaji }}</td>
                            <td>Rp. {{number_format($gp->gaji_netto, 0, ',', '.')}}</td>
                            <td>
                            <!-- detail -->
                                @can('gaji_pokok_pegawai_detail')
                                <a href="{{ route('gaji-pokok.show', ['gaji_pokok' => $gp]) }}" class="btn btn-sm btn-warning" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endcan
                                <!-- print -->
                                @can('gaji_pokok_pegawai_cetak')
                                <a href="{{ route('gaji-pokok.cetak', ['gaji_pokok' => $gp]) }}" class="btn btn-sm btn-secondary" role="button" target="_blank">
                                    <i class="fas fa-print"></i>
                                </a>
                                @endcan
                                <!-- edit -->
                                @can('gaji_pokok_pegawai_update')
                                <a href="{{ route('gaji-pokok.edit', ['gaji_pokok' => $gp]) }}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                <!-- delete -->
                                @can('gaji_pokok_pegawai_delete')
                                <form class="d-inline" role="alert" action="{{route('gaji-pokok.destroy',['gaji_pokok' => $gp])}}" method="POST" alert-title = "Hapus Gaji Pegawai?" alert-text = "Apakah anda yakin ingin menghapus data ini?">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan                    
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
      </div>
    </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();

            $("form[role='alert']").submit(function (event){
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: true,
                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });

            })
        })
    </script>
@endpush
