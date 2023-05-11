<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Scripts -->
    <script src="{{ asset('style.css') }}" defer></script>
</head>

<body>
    @yield('content')
</body>

</html>