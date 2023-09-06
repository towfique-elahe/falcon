@extends('layouts.super_admin_panel')

@section('title', 'Edit Admin Details - FALCON')
@section('pageTitle', 'edit admin details')
@section('msg')
    details of admin - {{ $admin->name }} 🧑🏻‍🤝‍🧑🏿
@endsection

@section('main')
    <main id="profile">
        <div class="card personal_info">
            <div>
                <h3 class="heading">Update Information</h3>
            </div>
            <form action="{{ route('updateUser', $admin->id) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $admin->name }}">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $admin->email }}">
                </div>
                <div class="input">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="{{ $admin->phone }}" pattern="01+[0-9]{9}">
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
