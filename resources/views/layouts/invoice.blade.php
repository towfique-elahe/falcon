<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/pictures/favicon.svg') }}" type="image/x-icon">
    <!-- stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/style/user_panel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/user_responsive.css') }}">
</head>

<body>
    <div class="container">
        <section id="main">
            {{-- main content --}}
            @yield('main')

            {{-- footer --}}
            <footer id="footer">
                © 2022 - <span>falcon</span> all right reserved
            </footer>
        </section>
    </div>
</body>

</html>
