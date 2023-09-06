{{-- footer --}}
<footer id="footer">
    <div class="container">
        <!-- footer top -->
        <div class="footer_top">
            <div class="footer_logo">
                <img src="{{ asset('assets/pictures/logo-dark.svg') }}" alt="">
                <p>A Brand of people’s first choice</p>
            </div>

            <div class="footer_content">
                <!-- company -->
                <div class="col">
                    <h4 class="link_heading">Company</h4>
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}#hero">Home</a></li>
                            <li><a href="{{ route('home') }}#about">About</a></li>
                            <li><a href="{{ route('home') }}#service">Service</a></li>
                            <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                            <li><a href="{{ route('home') }}#contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- support -->
                <div class="col">
                    <h4 class="link_heading">Support</h4>
                    <nav>
                        <ul>
                            <li><a href="javascript:void()">Our Team</a></li>
                            <li><a href="javascript:void()">Partner With Us</a></li>
                            <li><a href="javascript:void()">FAQ</a></li>
                            <li><a href="javascript:void()">Privacy Policy</a></li>
                            <li><a href="javascript:void()">Terms & Conditions</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- follow us -->
                <div class="col social">
                    <h4 class="link_heading">Follow Us</h4>
                    <nav>
                        <a href="javascript:void()">
                            <img src="{{ asset('assets/pictures/icon-facebook.svg') }}" alt="">
                        </a>
                        <a href="javascript:void()">
                            <img src="{{ asset('assets/pictures/icon-twitter.svg') }}" alt="">
                        </a>
                        <a href="javascript:void()">
                            <img src="{{ asset('assets/pictures/icon-instagram.svg') }}" alt="">
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- footer bottom -->
        <div class="footer_bottom">
            <hr>
            <p class="copyright">
                © 2022 - <span>falcon</span> all right reserved
            </p>
        </div>
    </div>
</footer>
