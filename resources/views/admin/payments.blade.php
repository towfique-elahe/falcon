@extends('layouts.admin_panel')

@section('title', 'Payments - FALCON')
@section('pageTitle', 'Payments')
@section('msg')
    hey {{ Auth::user()->name }}! check all payments 🔥
@endsection

@section('main')
    <main id="payments">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search payment details here ...">
            <img src="{{ asset('assets/pictures/search_icon.svg') }}" alt="">
        </div>

        <!-- users table -->
        @if ($count != 0)
            <table>
                <thead>
                    <tr>
                        <th>Invoice Id</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="dataList">
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->method }}</td>
                            <td>{{ $payment->tprice }}</td>
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
                                <a href="{{ route('adminPayment', $payment->id) }}" class="button view">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center">No payments</p>
        @endif
    </main>
@endsection
