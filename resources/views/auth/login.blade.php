@extends('layouts.frontend')

@section('title', 'Login Now - Falcon')

@section('main')
    <div class="container hero log">
        <img src="{{ asset('assets/pictures/login-illustration.svg') }}" alt="" class="sec_image">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="form">
            @csrf

            <div class="form_top">
                <h1 class="sec_heading">Login</h1>
                <p>Hey mate 😃<br>Just waiting for you to login</p>
            </div>

            <div class="form_inputs">
                <!-- Email Address -->
                <div class="input">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                        placeholder="Enter registered email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="input">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" type="password" name="password" placeholder="8 character password"
                        pattern=".{8,}" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <p>Don’t have an account? Go to <a href="{{ route('register') }}">Register</a></p>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-primary-button class="button action">
                {{ __('Log in') }} <img src="{{ asset('assets/pictures/icon-login.svg') }}" alt="">
            </x-primary-button>
        </form>
    </div>
@endsection
