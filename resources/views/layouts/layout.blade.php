@php
    $desa = App\Desa::find(1);
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <!-- SEO Management-->
    <meta name="author" content="Maulana Kevin Pradana">
    <meta name="keywords" content="desa {{ $desa->nama_desa }},{{ $desa->nama_desa }} {{ $desa->nama_kabupaten }},{{ $desa->nama_desa }},desa,desa.id,{{ $desa->nama_desa }} {{ $desa->nama_desa }} {{ $desa->nama_kabupaten }},desa di kecamatan {{ $desa->nama_desa }} {{ $desa->nama_kabupaten }},desa {{ $desa->nama_desa }} {{ $desa->nama_kabupaten }},daerah {{ $desa->nama_desa }},website desa {{ $desa->nama_desa }}, web desa {{ $desa->nama_desa }}, website {{ $desa->nama_desa }}, web {{ $desa->nama_desa }}">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="{{ asset(Storage::url($desa->logo)) }}" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i&subset=cyrillic" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('js/plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text font-weight-bold">
                    Desa {{ $desa->nama_desa }}
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Hero Section ======= -->
    <div class="py-3 bg-dark text-white d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-md-left">
        <img src="{{ asset(Storage::url($desa->logo)) }}" alt="" height="100px" class="mr-3">
        <div class="text-center">
            <h4 class="text-uppercase m-0" style="font-weight: bolder;font-family: Arial, Helvetica, sans-serif">Pemerintah Desa</h4>
            <h1 class="text-uppercase m-0" style="font-weight: bolder;font-family: Arial, Helvetica, sans-serif">{{ $desa->nama_desa }}</h1>
            <h6 class="m-0" style="font-weight: bolder;font-family: Arial, Helvetica, sans-serif">{{ $desa->alamat }}</h6>
        </div>
    </div><!-- End Hero -->

    <!-- ======= Header ======= -->
        @include('layouts.components.header')
    <!-- End Header -->

    <main id="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="bg-dark text-white">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Desa {{ $desa->nama_desa }}</span></strong> {{ date('Y') }}. All Rights Reserved
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top btn btn-primary rounded-circle"><i class="fas fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-sticky/jquery.sticky.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        const baseURL = $('meta[name="base-url"]').attr('content');
    </script>
    @stack('scripts')
</body>

</html>
