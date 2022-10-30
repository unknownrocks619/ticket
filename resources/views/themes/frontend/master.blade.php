<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('frontend/images/global/favicon.png') }}" sizes="192x192" />
    <!-- bootstrap link -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet" />
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&family=Lexend:wght@100;200;300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;400;600;800;900&family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&family=Nunito:wght@200&display=swap" rel="stylesheet">
    <style>
        p {
            font-family: 'Nunito', sans-serif !important;
        }

        .title {
            color: #242154 !important;
            font-family: 'Lexend', sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #242154 !important;
            font-family: 'Lexend', sans-serif !important;

        }

        .banner-title {
            font-family: 'Lexend', sans-serif !important;
            color: #fff !important
        }
    </style> <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('upschool/frontend/css/swiper-bundle.min.css') }}" />
    <!-- font icon -->
    <script src="https://kit.fontawesome.com/2f1f0451bd.js" crossorigin="anonymous"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('upschool/frontend/css/main.css') }}" />

    @stack("custom_css")

    <title>Africa Shipping Compay:: @yield('page_title')</title>
</head>

<body>

    <main>
        {{-- back to top button --}}
        <x-back-to-top />
        {{-- back to top button --}}
        @auth

        @include("frontend.layouts.navigation")
        @endauth
        @yield('content')

    </main>

    <!-- bootsrtap script -->
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <!-- bootsrtap script -->
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>

    @stack('custom_scripts')
</body>

</html>