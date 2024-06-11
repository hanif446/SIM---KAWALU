<ul class="sidenav navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('homepage.home') }}">
        <div class="sidebar-brand-icon ">
            <img src="{{asset('template/img/logo-tasik.png')}}" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">
            <span>KAWALU</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->


    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{set_active('dashboard.index')}}">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Heading -->
    <div class="sidebar-heading my-1">
        Master
    </div>
    
    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
                @can('manage_pegawai', 'manage_jabatan', 'manage_golongan_gaji')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pegawai</span>
                </a>
                @endcan
                <div id="collapseTwo" class="collapse @yield('main')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pegawai:</h6>
                    @can('manage_jabatan')   
                        <a class="collapse-item @yield('jabatan')" href="{{route('jabatan.index')}}">Data Jabatan</a>
                    @endcan
                    @can('manage_golongan_gaji')
                        <a class="collapse-item @yield('golongan_gaji')" href="{{route('golongan-gaji.index')}}">Data Pangkat/Golongan</a>
                    @endcan
                    @can('manage_pegawai')
                        <a class="collapse-item @yield('pegawai')" href="{{route('pegawai.index')}}">Data Pegawai</a>
                    @endcan
                    </div>
                </div>
        </li>

        <li class="nav-item">
                @can('manage_gaji_pokok_pegawai', 'manage_gaji_ttp_pegawai')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Gaji Pegawai</span>
                </a>
                @endcan
                <div id="collapseUtilities" class="collapse @yield('main_gaji')" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gaji Pegawai:</h6>
                    @can('manage_gaji_pokok_pegawai')
                        <a class="collapse-item @yield('gaji_pokok')" href="{{route('gaji-pokok.index')}}">Gaji Pegawai</a>
                    @endcan
                    @can('manage_gaji_ttp_pegawai')
                        <a class="collapse-item @yield('gaji_ttp')" href="{{route('gaji-ttp.index')}}">TPP Pegawai</a>
                    @endcan
                    </div>
                </div>
            </li>

        <li class="nav-item {{set_active('user.edit_profil')}}">
        @can('manage_edit_profil')
            @if ($user = Auth::user()->id)
            <a class="nav-link" href="{{route('user.edit_profil', ['user' => $user])}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Edit Profil</span>
            </a>
            @endif
        @endcan
        </li>
    @if (Auth::user()->roles->first()->name == 'SuperAdmin')
    @can('manage_users', 'manage_roles')
        <div class="sidebar-heading my-1">
            User Permission
        </div>
    @endcan
    @elseif (Auth::user()->roles->first()->name == 'Admin')
        @can('manage_users')
        <div class="sidebar-heading my-1">
            User Permission
        </div>
    @endcan
    @endif

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Users -->
  
        <li class="nav-item {{set_active(['user.index', 'user.show', 'user.create', 'user.edit'])}}">
        @can('manage_users')
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span>
            </a>
        @endcan
        </li>


    <!-- Nav Item - Roles -->
  
        <li class="nav-item {{set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit'])}}">
        @can('manage_roles')
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>Roles</span>
            </a>
        @endcan
        </li>
    <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>
