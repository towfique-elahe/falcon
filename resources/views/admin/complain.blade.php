@extends('layouts.admin_panel')

@section('title', 'Complain - FALCON')
@section('pageTitle', 'Complain Details')
@section('msg')
    Here is the complain of {{ $complain->name }}😔
@endsection

@section('main')
    <main id="complain">
        <div class="complain-container">
            <dl>
                <div class="dl">
                    <dt>Id</dt>
                    <dd>{{ $complain->id }}</dd>
                </div>
                <div class="dl">
                    <dt>Name</dt>
                    <dd>{{ $complain->name }}</dd>
                </div>
                <div class="dl">
                    <dt>Email</dt>
                    <dd>{{ $complain->email }}</dd>
                </div>
                <div class="dl">
                    <dt>Phone</dt>
                    <dd>{{ $complain->phone }}</dd>
                </div>
                <div class="dl">
                    <dt>Complained Date</dt>
                    <dd>{{ $complain->created_at }}</dd>
                </div>
                <dt>Complain Description</dt>
                <dd>{{ $complain->description }}</dd>
                <div class="buttons">
                    <a href="mailto:{{ $complain->email }}" class="button">Mail</a>
                    <a href="tel:{{ $complain->phone }}" class="button">Call</a>
                    <a href="javascript:void()" onclick="deleteOpen()" class="button delete">Solved</a>
                </div>
            </dl>
        </div>

        <!-- confirm modal -->
        <div class="modal_container" id="deleteModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">Are you sure?</h3>
                    <a href="javascript:void()" onclick="deleteClose()" class="modal_close">
                        <img src="/assets/pictures/close.svg" alt="">
                    </a>
                </div>
                <!-- modal content -->
                <div class="buttons">
                    <a href="{{ route('destroyComplain', $complain->id) }}" class="button delete">Yes</a>
                    <a href="javascript:void()" onclick="deleteClose()" class="button action">No</a>
                </div>
            </div>
        </div>
    </main>
@endsection
