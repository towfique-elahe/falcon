@extends('layouts.super_admin_panel')

@section('title', 'User Details - FALCON')
@section('pageTitle', 'user details')
@section('msg')
    details of user - {{ $user->name }} 🧑🏻‍🤝‍🧑🏿
@endsection

@section('main')
    <main id="details">
        <div class="details-container">
            <dl>
                <div class="dl">
                    <dt>Id</dt>
                    <dd>{{ $user->id }}</dd>
                </div>
                <div class="dl">
                    <dt>Name</dt>
                    <dd>{{ $user->name }}</dd>
                </div>
                <div class="dl">
                    <dt>Email</dt>
                    <dd>{{ $user->email }}</dd>
                </div>
                <div class="dl">
                    <dt>Phone</dt>
                    <dd>{{ $user->phone }}</dd>
                </div>
                <div class="dl">
                    <dt>User Registered</dt>
                    <dd>{{ $user->created_at }}</dd>
                </div>
                <div class="dl">
                    <dt>User Updated</dt>
                    <dd>{{ $user->updated_at }}</dd>
                </div>
                <div class="dl">
                    <dt>User Picture</dt>
                    <dd><img src="{{ !empty($user->image) ? url('upload/admin_images/' . $user->image) : url('assets/pictures/user.jpg') }}"
                            alt="" class="user_image"></dd>
                </div>
                <div class="buttons">
                    <a href="{{ route('makeAdmin', $user->id) }}" class="button">Make Admin</a>
                    <a href="{{ route('editUser', $user->id) }}" class="button">Edit</a>
                    <a href="{{ route('deleteUser', $user->id) }}" class="button">Delete</a>
                </div>
            </dl>
        </div>
    </main>
@endsection
