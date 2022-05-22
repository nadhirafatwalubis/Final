<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! SEO::generate() !!}

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome-free-5.15.4-web/css/all.min.css') }}">

    <link rel="icon" href="{{ config('settings.favicon_url') }}">

    <link href="{{ mix('frontend/css/app.css') }}" rel="stylesheet">

    {!! config('settings.g_verif') !!}

    {!! config('settings.g_tag') !!}
</head>

<body>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>

    @include('frontend.layouts.nav')
    <!-- END nav -->

    @yield('content')

    @include('frontend.layouts.footer')

    <script src="{{ mix('frontend/js/app.js') }}"></script>

    @stack('script')

    {!! config('settings.script') !!}

</body>

</html>