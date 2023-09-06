@extends('layouts.user_panel')

@section('title', 'Dues - FALCON')
@section('pageTitle', 'due')
@section('msg', 'hey john! you have due 😢')
@section('msg')
    hey {{ Auth::user()->name }}! you have due 😢
@endsection

@section('main')
    <main id="dues">
        @if (isset($data))
            <div class="due_container">
                <div class="due_card">
                    <div>
                        <img src="{{ asset('assets/pictures/dues-icon.svg') }}" alt="">
                        <h3 class="heading">Due</h3>
                    </div>
                    <p class="due_amount">৳ <span>{{ $data->price }}</span></p>
                </div>
                <div class="due_table">
                    <h3 class="heading">Dues</h3>
                    <table>
                        <tr>
                            <th>Due Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>{{ $data->sub_end }}</td>
                            <td>৳ <span>{{ $data->price }}</span></td>
                            <td>
                                <form action="{{ route('planurl') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="name" value="{{ $data->plan }}">
                                    <input type="hidden" name="price" value="{{ $data->price }}">
                                    <button class="button due_pay">Clear</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @else
            <div class="due_card">
                <div>
                    <img src="{{ asset('assets/pictures/dues-icon.svg') }}" alt="">
                    <h3 class="heading">Dues</h3>
                </div>
                <p class="due_amount">No Dues</p>
            </div>
        @endif

        <img src="{{ asset('assets/pictures/due_illustration.svg') }}" alt="" class="illustration">
    </main>
@endsection
