@extends('layouts.admin_panel')

@section('title', 'Payment Details - FALCON')
@section('pageTitle', 'payment details')
@section('msg')
    payment details of {{ $data->name }} 🧑🏻‍🤝‍🧑🏼
@endsection

@section('main')
    <main id="details">
        <div class="details-container">
            <dl>
                <div class="dl">
                    <dt>Invoice Id</dt>
                    <dd>{{ $data->id }}</dd>
                </div>
                <div class="dl">
                    <dt>User Name</dt>
                    <dd>{{ $data->name }}</dd>
                </div>
                <div class="dl">
                    <dt>User Email</dt>
                    <dd>{{ $data->email }}</dd>
                </div>
                @if ($data->method == 'cash')
                    <div class="dl">
                        <dt>Billing Phone</dt>
                        <dd>{{ $data->billing_phone }}</dd>
                    </div>
                @endif
                <div class="dl">
                    <dt>Billing Address</dt>
                    <dd>{{ $data->billing_add }}</dd>
                </div>
                <div class="dl">
                    <dt>Amount</dt>
                    <dd>৳ {{ $data->tprice }}</dd>
                </div>
                <div class="dl">
                    <dt>Payment Method</dt>
                    <dd>{{ $data->method }}</dd>
                </div>
                @if ($data->method == 'bkash')
                    <div class="dl">
                        <dt>Bkash Account Number</dt>
                        <dd>{{ $data->b_number }}</dd>
                    </div>
                    <div class="dl">
                        <dt>Bkash Transaction Id</dt>
                        <dd>{{ $data->b_trans }}</dd>
                    </div>
                @endif
                <div class="dl">
                    <dt>Payment Status</dt>
                    <dd>
                        @php
                            if ($data->status == 1 || $data->method == 'card') {
                                echo 'Paid';
                            } else {
                                echo 'Pending';
                            }
                        @endphp
                    </dd>
                </div>
                <div class="dl">
                    <dt>Date</dt>
                    <dd>{{ $data->created_at }}</dd>
                </div>
                <div class="buttons">
                    @if ($data->status == 0 && $data->method != 'card')
                        <a href="{{ route('approvePay', $data->id) }}" class="button delete">Approve</a>
                    @endif
                    <a href="mailto:{{ $data->email }}" class="button">Mail</a>
                    @if ($data->method == 'cash')
                        <a href="tel:{{ $data->billing_phone }}" class="button">Call</a>
                    @endif
                </div>
            </dl>
        </div>
    </main>
    </main>
@endsection
