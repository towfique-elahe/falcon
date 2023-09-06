@extends('layouts.user_panel')

@section('title', 'Transactions - FALCON')
@section('pageTitle', 'transactions')
@section('msg')
    hey {{ Auth::user()->name }}! here is all you gave to falcon 😃
@endsection

@section('main')
    <main id="transactions">
        <div class="transaction_table">
            <h3 class="table_title">
                <img src="{{ asset('assets/pictures/transactions-icon.svg') }}" alt="">
                recent transactions
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
                        @foreach ($payments->reverse() as $payment)
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
