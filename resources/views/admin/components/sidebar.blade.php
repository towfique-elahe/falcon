<aside id="sidebar">
    <div class="sidebar_top">
        <a href="{{ route('adminDashboard') }}"><img src="{{ asset('assets/pictures/logo-light.svg') }}" alt=""
                class="logo"></a>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('adminDashboard') }}">
                        <img src="{{ asset('assets/pictures/dashboard-icon.svg') }}" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminProfile') }}">
                        <img src="{{ asset('assets/pictures/profile-icon.svg') }}" alt="">
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminUsers') }}">
                        <img src="{{ asset('assets/pictures/users_icon.svg') }}" alt="">
                        <span>Users</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('adminConnections') }}">
                        <img src="{{ asset('assets/pictures/connection-icon.svg') }}" alt="">
                        <span>Connections</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('adminSubscriptions') }}">
                        <img src="{{ asset('assets/pictures/subscription-icon.svg') }}" alt="">
                        <span>Subscriptions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminPayments') }}">
                        <img src="{{ asset('assets/pictures/payment_icon.svg') }}" alt="">
                        <span>Payments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminDues') }}">
                        <img src="{{ asset('assets/pictures/dues-icon.svg') }}" alt="">
                        <span>Dues</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminComplains') }}">
                        <img src="{{ asset('assets/pictures/complain.svg') }}" alt="">
                        <span>Complains</span>
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
