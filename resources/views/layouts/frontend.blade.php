<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('ui/assets/pictures/favicon.svg') }}" type="image/x-icon">
    {{-- style files --}}
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/auth.css') }}">
</head>

<body>
    {{-- hero --}}
    <section id="hero">
        @include('components.header')
        @yield('main')
    </section>

    @yield('service')
    @yield('about')
    @yield('pricing')
    @yield('contact')
    @yield('footer')

    {{-- mobile nav js --}}
    <script src="{{ asset('assets/js/mobile_nav.js') }}"></script>

    {{-- tidio chatbot --}}
    <script src="//code.tidio.co/twbspc6mnupjw5gibhskqpaqoiimscra.js" async></script>
</body>

</html>
