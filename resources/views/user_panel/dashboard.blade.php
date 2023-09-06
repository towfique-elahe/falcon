@extends('layouts.user_panel')

@section('title', 'Dashboard - FALCON')
@section('pageTitle', 'dashboard')
@section('msg')
    welcome {{ Auth::user()->name }}!
@endsection

@section('main')
    <main id="dashboard">
        <div class="status_container">
            <a href="{{ route('connection') }}" class="status">
                <img src="{{ asset('assets/pictures/connection-icon.svg') }}" alt="" class="status_icon">
                <div class="status_info">
                    @if (isset($conn->sub_status))
                        <h3 class="status_title">connected</h3>
                    @else
                        <h3 class="status_title">disconnected</h3>
                    @endif
                    <p>your connection status</p>
                </div>
            </a>
            <a href="{{ route('subscription') }}" class="status">
                <img src="{{ asset('assets/pictures/subscription-icon.svg') }}" alt="" class="status_icon">
                <div class="status_info">
                    @if (isset($conn->plan))
                        <h3 class="status_title">{{ $conn->plan }}</h3>
                    @else
                        <h3 class="status_title">No Subscription</h3>
                    @endif
                    <p>your subscription</p>
                </div>
            </a>
            <a href="{{ route('dues') }}" class="status">
                <img src="{{ asset('assets/pictures/dues-icon.svg') }}" alt="" class="status_icon">
                <div class="status_info">
                    @if (isset($due->due_status) && $due->due_status == 1)
                        <h3 class="status_title">৳ {{ $due->price }}</h3>
                    @else
                        <h3 class="status_title">No Due</h3>
                    @endif
                    <p>your due</p>
                </div>
            </a>
        </div>

        <div class="transaction_table">
            <h3 class="table_title">
                <img src="{{ asset('assets/pictures/transactions-icon.svg') }}" alt="">
                recent 3 transactions
            </h3>
            @if (isset($data))
                <table>
                    <thead>
                        <tr>
                            <th>Invoice Id</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Date</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>৳ {{ $payment->tprice }}</td>
                                <td>
                                    @php
                                        if ($payment->status == 1 || $payment->method == 'card') {
                                            echo 'Paid';
                                        } else {
                                            echo 'Pending';
                                        }
                                    @endphp
                                </td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                    <a href="{{ route('transaction', $payment->id) }}" class="action">
                                        <img src="{{ asset('assets/pictures/detials_icon.svg') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table>
                    <tr>
                        <td>Yet you don't have any transaction</td>
                    </tr>
                </table>
            @endif
        </div>
    </main>
@endsection
