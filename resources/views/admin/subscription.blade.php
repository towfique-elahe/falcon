@extends('layouts.admin_panel')

@section('title', 'Subscription Details - FALCON')
@section('pageTitle', 'subscription details')
@section('msg')
    subscription details of {{ $sub->name }}🧑🏻‍🤝‍🧑🏼
@endsection

@section('main')
    <main id="details">
        <div class="details-container">
            <dl>
                <div class="dl">
                    <dt>User Id</dt>
                    <dd>{{ $sub->user_id }}</dd>
                </div>
                <div class="dl">
                    <dt>User Name</dt>
                    <dd>{{ $sub->name }}</dd>
                </div>
                <div class="dl">
                    <dt>User Email</dt>
                    <dd>{{ $sub->email }}</dd>
                </div>
                <div class="dl">
                    <dt>Subscription Started</dt>
                    <dd>{{ $sub->created_at }}</dd>
                </div>
                <div class="dl">
                    <dt>Subscription Ends</dt>
                    <dd>{{ $sub->sub_end }}</dd>
                </div>
                <div class="dl">
                    <div class="buttons">
                        <a href="mailto:{{ $sub->email }}" class="button">Mail</a>
                    </div>
                </div>
            </dl>
        </div>
    </main>
    </main>
@endsection
