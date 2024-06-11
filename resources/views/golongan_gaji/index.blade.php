@extends('layouts.dashboard')
@section('breadcrumbs')
{{Breadcrumbs::render('dashboard_golongan_gaji')}}
@endsection
@section('golongan_gaji', 'active')
@section('main', 'show')
@section('content')
{{--    Message Alert --}}
@include('layouts.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('golongan_gaji_create')
            <a href="{{route('golongan-gaji.create')}}" class="btn btn-success float-right" role="button">
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
                            <th class="text-center">Pangkat/Golongan</th>
                            <th class="text-center">Nominal Gaji</th>
                            <th class="text-center">Nominal TPP</th>
                            <th class="text-center">TMT Golongan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach($golongan_gaji as $g)
                    <tr align="center">
                        <td align="center">{{ $no++ }}</td>
                        <td>{{ $g->golongan }}</td>
                        <td align="left">Rp. {{number_format($g->nominal_gaji_pokok, 0, ',', '.')}}</td>
                        <td align="left">Rp. {{number_format($g->nominal_gaji_ttp, 0, ',', '.')}}</td>
                        <td>{{ date("d F Y", strtotime($g->tmt_golongan)) }}</td>
                        <td>
                        <!-- edit -->
                        @can('golongan_gaji_update')
                            <a href="{{ route('golongan-gaji.edit', ['golongan_gaji' => $g]) }}" class="btn btn-sm btn-info" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        <!-- delete -->
                        @can('golongan_gaji_delete')
                            <form class="d-inline" role="alert" action="{{ route('golongan-gaji.destroy', ['golongan_gaji' => $g]) }}" method="POST" alert-title = "Hapus Pangkat/Gaji?" alert-text = "Apakah anda yakin ingin menghapus data ini?">
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
