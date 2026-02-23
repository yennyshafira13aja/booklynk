<!DOCTYPE html>
<html>
<head>
    <title>BookLynk</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white m-0">

    @include('layouts.navbar.navbar-peminjam')

    @yield('content')

<style>
@keyframes marquee {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
</style>

</body>
</html>
