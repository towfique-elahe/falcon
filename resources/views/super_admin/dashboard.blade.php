@extends('layouts.super_admin_panel')

@section('title', 'Super Admin Dashboard - FALCON')
@section('pageTitle', 'Super admin dashboard')
@section('msg')
    welcome {{ Auth::user()->name }}! everyone is in your hand 🥱
@endsection

@section('main')
    <main id="dashboard">
        <div class="card_container">
            <!-- admins status -->
            <a href="{{ route('superAdmins') }}" class="card">
                <div class="card_info">
                    <img src="{{ asset('assets/pictures/admins-icon.svg') }}" alt="" class="card_img">
                    <h3 class="card_heading">Admins</h3>
                </div>
                <p class="total">{{ $admins }}</p>
            </a>

            <!-- user status -->
            <a href="{{ route('superUsers') }}" class="card">
                <div class="card_info">
                    <img src="{{ asset('assets/pictures/users_icon.svg') }}" alt="" class="card_img">
                    <h3 class="card_heading">Users</h3>
                </div>
                <p class="total">{{ $users }}</p>
            </a>
        </div>
    </main>
@endsection
