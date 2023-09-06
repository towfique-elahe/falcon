@extends('layouts.admin_panel')

@section('title', 'Due Details - FALCON')
@section('pageTitle', 'due details')
@section('msg')
    due details of {{ $due->name }}🧑🏻‍🤝‍🧑🏼
@endsection

@section('main')
    <main id="details">
        <div class="details-container">
            <dl>
                <div class="dl">
                    <dt>Id</dt>
                    <dd>{{ $due->id }}</dd>
                </div>
                <div class="dl">
                    <dt>User Id</dt>
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
                    <dt>Plan</dt>
                    <dd>{{ $due->plan }}</dd>
                </div>
                <div class="dl">
                    <dt>Subscription Started</dt>
                    <dd>{{ $due->created_at }}</dd>
                </div>
                <div class="dl">
                    <dt>Subscription Ended</dt>
                    <dd>{{ $due->sub_end }}</dd>
                </div>
                <div class="dl">
                    <dt>Due Amount</dt>
                    <dd>৳ {{ $due->price }}</dd>
                </div>
                <div class="dl">
                    <div class="buttons">
                        <a href="mailto:{{ $user->email }}" class="button">Mail</a>
                        <a href="tel:{{ $user->phone }}" class="button">Call</a>
                    </div>
                </div>
            </dl>
        </div>
    </main>
@endsection
