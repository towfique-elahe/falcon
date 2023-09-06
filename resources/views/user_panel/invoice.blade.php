@extends('layouts.invoice')

@section('title', 'Invoice - FALCON')

@section('main')
    <main id="transactions">
        <div class="modal_top">
            <h3 class="modal_heading">Invoice Id: {{ $transaction->id }}</h3>
        </div>
        <hr>
        <div class="transaction_modal">
            <div class="brand">
                <img src="{{ asset('assets/pictures/logo-light.svg') }}" alt="" class="logo">
            </div>
            <table class="invoice_info">
                <tr>
                    <td>User Id:</td>
                    <td>{{ $transaction->user_id }}</td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td>{{ $transaction->name }}</td>
                </tr>
                <tr>
                    <td>Subscription Plan:</td>
                    <td>{{ $transaction->plan }}</td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td>৳ {{ $transaction->price }}</td>
                </tr>
                <tr>
                    <td>Payment Status:</td>
                    <td>
                        @php
                            if ($transaction->status == 1 || $transaction->method == 'card') {
                                echo 'Paid';
                            } else {
                                echo 'Pending';
                            }
                        @endphp
                    </td>
                </tr>
                <tr>
                    <td>Payment Method:</td>
                    <td>{{ $transaction->method }}</td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            </table>
            <table class="pricing">
                <tr>
                    <td>Subtotal</td>
                    <td>৳ <span>{{ $transaction->price }}</span></td>
                </tr>
                <tr class="price">
                    <td>Total (with 10% vat)</td>
                    <td>৳ <span>{{ $transaction->tprice }}</span></td>
                </tr>
            </table>
        </div>
        <a href="javascript:void()" onclick="window.print()" class="print">Print Invoice</a>
    </main>
@endsection
