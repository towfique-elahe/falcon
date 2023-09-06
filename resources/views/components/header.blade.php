<header id="header">
    <div class="container">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/pictures/logo-light.svg') }}" alt=""
                class="logo"></a>

        <nav class="nav">
            <ul>
                <li><a href="{{ route('home') }}#hero">Home</a></li>
                <li><a href="{{ route('home') }}#service">Service</a></li>
                <li><a href="{{ route('home') }}#about">About</a></li>
                <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                <li><a href="{{ route('home') }}#contact">Contact</a></li>
            </ul>

            <a href="{{ route('login') }}" class="button action">Login</a>
        </nav>

        {{-- mobile header --}}
        <nav class="mobile_nav">
            <img onclick="mobileNav()" class="drop_btn" src="/assets/pictures/mobile_nav.svg" alt="">
            <ul id="dropList" class="drop_list">
                <li><a href="{{ route('home') }}#hero">Home</a></li>
                <li><a href="{{ route('home') }}#service">Service</a></li>
                <li><a href="{{ route('home') }}#about">About</a></li>
                <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                <li><a href="{{ route('home') }}#contact">Contact</a></li>
                <li><a href="{{ route('login') }}" class="action">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
