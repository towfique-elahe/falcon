<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/pictures/favicon.svg') }}" type="image/x-icon">
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/style/admin_panel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/admin_responsive.css') }}">
    {{-- search bar jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        {{-- sidebar --}}
        @include('super_admin.components.sidebar')

        <section id="main">
            {{-- topbar --}}
            @include('super_admin.components.topbar')

            {{-- main content --}}
            @yield('main')

            {{-- footer --}}
            <footer id="footer">
                © 2022 - <span>falcon</span> all right reserved
            </footer>
        </section>
    </div>

    {{-- modal js --}}
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    {{-- search js --}}
    <script src="/assets/js/search.js"></script>
</body>

</html>
