@extends('layouts.admin_panel')

@section('title', 'Users - FALCON')
@section('pageTitle', 'users list')
@section('msg')
    hey {{ Auth::user()->name }}! all users are here 🧑🏻‍🤝‍🧑🏼
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
                    <a href="mailto:{{ $user->email }}" class="button">Mail</a>
                    <a href="tel:{{ $user->phone }}" class="button">Call</a>
                </div>
            </dl>
        </div>
    </main>
    </main>
@endsection
