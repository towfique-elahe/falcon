@extends('layouts.super_admin_panel')

@section('title', 'Edit User Details - FALCON')
@section('pageTitle', 'edit user details')
@section('msg')
    details of user - {{ $user->name }} 🧑🏻‍🤝‍🧑🏿
@endsection

@section('main')
    <main id="profile">
        <div class="card personal_info">
            <div>
                <h3 class="heading">Update Information</h3>
            </div>
            <form action="{{ route('updateAdmin', $user->id) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="input">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="{{ $user->phone }}" pattern="01+[0-9]{9}">
                </div>
                <hr>
                <div class="buttons">
                    <button class="button cancel" type="reset">Cancel</button>
                    <button class="button action" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </main>
@endsection
