@extends('layouts.dashboard')
@section('breadcrumbs')
{{Breadcrumbs::render('dashboard_jabatan')}}
@endsection
@section('jabatan', 'active')
@section('main', 'show')
@section('content')
{{--    Message Alert --}}
@include('layouts.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('jabatan_create')
            <a href="{{route('jabatan.create')}}" class="btn btn-success float-right" role="button">
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
                            <th class="text-center">Nama Jabatan</th>
                            <th class="text-center">Jenis Jabatan</th>
                            <th class="text-center">Eselon</th>
                            <th class="text-center">TMT Jabatan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach($jabatan as $j)
                    <tr align="center">
                        <td align="center">{{ $no++ }}</td>
                        <td>{{ $j->nama_jabatan }}</td>
                        <td>{{ $j->jenis_jabatan }}</td>
                        <td>{{ $j->eselon }}</td>
                        <td>{{ date("d F Y", strtotime($j->tmt_jabatan)) }}</td>
                        <td>
                        <!-- edit -->
                        @can('jabatan_update')
                            <a href="{{ route('jabatan.edit', ['jabatan' => $j]) }}" class="btn btn-sm btn-info" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        <!-- delete -->
                        @can('jabatan_delete')
                            <form class="d-inline" role="alert" action="{{ route('jabatan.destroy', ['jabatan' => $j]) }}" method="POST" alert-title = "Hapus Jabatan?" alert-text = "Apakah anda yakin ingin menghapus data ini?">
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
