<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('template/img/logo-tasik.png')}}">
      <title>
        {{config('app.name')}}
      </title>
    <link rel="stylesheet" href="{{asset('template2/style/style.css')}}">
    
</head>
<body>

<header>
    @include('layouts._homepage.navbar')
</header>

<main>
    @yield('content')
</main>
@include('layouts._homepage.footer')
</body>
</html>