<nav>
    <div class="logo">
        <img src="{{asset('template2/assets/img/logo-tasik.png')}}">
        <h1>KAWALU</h1>
    </div>
    @auth
    <ul class="after">
        <li><a href="#">Beranda</a></li>
        <li><a href="#tentang-kami">Tentang Kami</a></li>
        <li><a href="#profil">Profil</a></li>
            <li><a href="{{ route('dashboard.index') }}" class="btn btn-yellow-border">Dashboard</a></li>
            <li><a href="{{ route('logout') }}" class="btn btn-yellow-border" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </ul>

    @else
    <ul class="before">
        <li><a href="#">Beranda</a></li>
        <li><a href="#tentang-kami">Tentang Kami</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="{{ route('login') }}" class="btn btn-yellow-border">Login</a></li>
    </ul>
    @endauth
</nav>