@extends('layouts.dashboard')
@section('breadcrumbs')
    {{\Diglactic\Breadcrumbs\Breadcrumbs::render('dashboard_roles')}}
@endsection
@section('content')
{{--    Message Alert --}}
@include('layouts.alert')

<!-- section:content -->
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
           <div class="row">
               <div class="col-md-6">
                  <form action="{{ route('roles.index') }}" method="GET">
                    <div class="col-md-6">
                     <div class="input-group">
                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="Search for roles">
                        <div class="input-group-append">
                           <button class="btn btn-success" type="submit">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                    </div>
                  </form>
               </div>
               <div class="col-md-6">
                @can('role_create')
                  <a href="{{ route('roles.create') }}" class="btn btn-success float-right" role="button">
                     Tambah Data
                     <i class="fas fa-plus-square"></i>
                  </a>
                @endcan
               </div>
            </div>
         </div>
         <div class="card-body">
            <ul class="list-group list-group-flush">
               <!-- list role -->
               @forelse ($roles as $role)
               		<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                    	<label class="mt-auto mb-auto">
                       		{{ $role->name }}  
                        </label>
                        <div>
                        	<!-- detail -->
                          @can('role_detail')
                            <a href="{{ route('roles.show', ['role'=> $role ]) }}" class="btn btn-sm btn-warning"
                             role="button">
                               <i class="fas fa-eye"></i>
                            </a>
                          @endcan
                          <!-- edit -->
                          @can('role_create')
                            <a href="{{ route('roles.edit', ['role'=> $role ]) }}" class="btn btn-sm btn-info" role="button">
                                <i class="fas fa-edit"></i>
                             </a>
                          @endcan
                          <!-- delete -->
                          @can('role_create')
                            <form class="d-inline" role="alert" action="{{route('roles.destroy',['role' => $role])}}"method="POST" alert-title = "Hapus Role?" alert-text = "Apakah anda yakin ingin menghapus data ini?">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                                 <i class="fas fa-trash"></i>
                              </button>
                           </form>
                          @endcan
                        </div>
                     </li>
               @empty
               	<p>
               		<strong>
                    @if (request()->get('keyword'))
                     {{request()->get('keyword')}} Not Found in Role
                    @else
                      No Roles Data Yet
                    @endif
               		</strong>
               	</p>
               @endforelse
            </ul>
         </div>
         @if ($roles->hasPages())
           <div class="card-footer">
              {{$roles->links('vendor.pagination.bootstrap-5')}}
           </div>
         @endif
      </div>
   </div>
</div>


@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function () {
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
