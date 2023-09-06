<aside id="sidebar">
    <div class="sidebar_top">
        <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/pictures/logo-light.svg') }}" alt=""
                class="logo"></a>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/pictures/dashboard-icon.svg') }}" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <img src="{{ asset('assets/pictures/profile-icon.svg') }}" alt="">
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('connection') }}">
                        <img src="{{ asset('assets/pictures/connection-icon.svg') }}" alt="">
                        <span>Connection</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subscription') }}">
                        <img src="{{ asset('assets/pictures/subscription-icon.svg') }}" alt="">
                        <span>Subscription</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dues') }}">
                        <img src="{{ asset('assets/pictures/dues-icon.svg') }}" alt="">
                        <span>Dues</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transactions') }}">
                        <img src="{{ asset('assets/pictures/transactions-icon.svg') }}" alt="">
                        <span>Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('complain') }}">
                        <img src="{{ asset('assets/pictures/complain.svg') }}" alt="">
                        <span>Complain</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="sidebar_bottom">
        <a href="{{ route('logout') }}">
            <img src="{{ asset('assets/pictures/logout-icon.svg') }}" alt=""> <span>Logout</span>
        </a>
    </div>
</aside>
