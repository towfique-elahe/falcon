@extends('layouts.frontend')

@section('title', 'Falcon - Your Internet Partner')

@section('main')
    <div class="container hero">
        <div class="hero_info">
            <h1 class="sec_heading">Boost your internet experience with us </h1>
            <p class="sec_sub_heading">We are passionate about fuelling your growth 🚀</p>
            <p>We are enabling a superior digital lifestyle by the touch of a great broadband internet service
                nationwide in which every moment and experience is filled with the joy of celebration.</p>
            <div class="buttons">
                <a href="{{ route('register') }}" class="action button">Register</a>
                <a href="{{ route('home') }}#contact" class="button">Contact</a>
            </div>
        </div>

        <img src="{{ asset('assets/pictures/home-hero-illustration.svg') }}" alt="" class="sec_image">
    </div>
@endsection


@section('service')
    @include('components.service')
@endsection

@section('about')
    @include('components.about')
@endsection

@section('pricing')
    @include('components.pricing')
@endsection

@section('contact')
    @include('components.contact')
@endsection

@section('footer')
    @include('components.footer')
@endsection
