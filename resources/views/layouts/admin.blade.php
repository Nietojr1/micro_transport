<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TransAcme</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap">
    <link rel="stylesheet" href="{{ asset('css/plugins/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <div class="wrapper">

            @include('layouts.structure.header')

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ '/home' }}" class="brand-link d-flex flex-column align-items-center">
                    <div class="image text-center">
                        <img src="{{ asset('assets/logo/LogoTransp.png') }}" class="w-2" alt="User Image">
                    </div>
                    <span class="brand-text font-weight-light">Transp Acme</span>
                </a>
                @include('layouts.structure.sidebar')
            </aside>

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
