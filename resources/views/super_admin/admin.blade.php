@extends('layouts.super_admin_panel')

@section('title', 'Admin Details - FALCON')
@section('pageTitle', 'admin details')
@section('msg')
    details of admin - {{ $admin->name }} 🧑🏻‍🤝‍🧑🏿
@endsection

@section('main')
    <main id="details">
        <div class="details-container">
            <dl>
                <div class="dl">
                    <dt>Id</dt>
                    <dd>{{ $admin->id }}</dd>
                </div>
                <div class="dl">
                    <dt>Name</dt>
                    <dd>{{ $admin->name }}</dd>
                </div>
                <div class="dl">
                    <dt>Email</dt>
                    <dd>{{ $admin->email }}</dd>
                </div>
                <div class="dl">
                    <dt>Phone</dt>
                    <dd>{{ $admin->phone }}</dd>
                </div>
                <div class="dl">
                    <dt>Admin Registered</dt>
                    <dd>{{ $admin->created_at }}</dd>
                </div>
                <div class="dl">
                    <dt>Admin Updated</dt>
                    <dd>{{ $admin->updated_at }}</dd>
                </div>
                <div class="dl">
                    <dt>Admin Picture</dt>
                    <dd><img src="{{ !empty($admin->image) ? url('upload/admin_images/' . $admin->image) : url('assets/pictures/user.jpg') }}"
                            alt="" class="user_image"></dd>
                </div>
                <div class="buttons">
                    <a href="{{ route('makeUser', $admin->id) }}" class="button">Make User</a>
                    <a href="{{ route('editAdmin', $admin->id) }}" class="button">Edit</a>
                    <a href="{{ route('deleteAdmin', $admin->id) }}" class="button">Delete</a>
                </div>
            </dl>

        </div>
    </main>
@endsection
