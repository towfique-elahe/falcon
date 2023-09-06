<aside id="sidebar">
    <div class="sidebar_top">
        <a href="{{ route('superDashboard') }}"><img src="{{ asset('assets/pictures/logo-light.svg') }}" alt=""
                class="logo"></a>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('superDashboard') }}">
                        <img src="{{ asset('assets/pictures/dashboard-icon.svg') }}" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superSettings') }}">
                        <img src="{{ asset('assets/pictures/settings-icon.svg') }}" alt="">
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superAdmins') }}">
                        <img src="{{ asset('assets/pictures/admins-icon.svg') }}" alt="">
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superUsers') }}">
                        <img src="{{ asset('assets/pictures/users_icon.svg') }}" alt="">
                        <span>Users</span>
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
