<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body style="font-family: 'Poppins', sans-serif;" class="bg-[#F5F8FD]">
    @include('layouts.landing.navbar')

    @yield('content')

    @include('layouts.landing.mobileNav')
    @include('sweetalert::alert')
</body>

</html>
