@extends('layouts.frontend')

@section('title', 'Register Now - Falcon')

@section('main')
    <div class="container hero log">
        <img src="{{ asset('assets/pictures/register-illustration.svg') }}" alt="" class="sec_image">

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <div class="form_top">
                <h1 class="sec_heading">Register</h1>
                <p>FALCON is waiting for you 😊<br>Register now</p>
            </div>
            <div class="form_inputs">
                <!-- Name -->
                <div class="input">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                        placeholder="your full name" required autofocus />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email Address -->
                <div class="input">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                        placeholder="example@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Phone Number -->
                <div class="input">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" type="tel" name="phone" :value="old('phone')" placeholder="01XXXXXXXXX"
                        pattern="01+[0-9]{9}" />
                    <x-input-error :messages="$errors->get('phone')" />
                </div>

                <!-- Password -->
                <div class="input">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" type="password" name="password" placeholder="8 character password"
                        pattern=".{8,}" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="input">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="8 character password" pattern=".{8,}" required />

                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <p>Have an account? Go to <a href="{{ route('login') }}">Login</a></p>
            </div>

            <x-primary-button class="button action">
                {{ __('Register') }} <img src="{{ asset('assets/pictures/icon-login.svg') }}" alt="">
            </x-primary-button>
        </form>
    </div>
@endsection
