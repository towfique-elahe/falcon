@extends('layouts.frontend')

@section('title', 'Register Now - Falcon')

@section('main')
    <div class="container hero log">
        <img src="{{ asset('assets/pictures/register-illustration.svg') }}" alt="" class="sec_image">

        <form method="POST" action="{{ route('password.email') }}" class="form">
            @csrf
            <div class="form_top">
                <h1 class="sec_heading">Reset Password</h1>
                <p>Forgot your password? No problem.😊 <br>Just let us know your email address and we will email you a
                    password
                    reset link that will allow you to choose a new one.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <div class="form_inputs">
                <!-- Email Address -->
                <div class="input">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                        placeholder="Enter registered email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" />
                </div>
            </div>

            <x-primary-button class="button action">
                {{ __('Reset') }} <img src="{{ asset('assets/pictures/icon-login.svg') }}" alt="">
            </x-primary-button>
        </form>
    </div>
@endsection
