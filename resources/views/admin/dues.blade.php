@extends('layouts.admin_panel')

@section('title', 'Dues - FALCON')
@section('pageTitle', 'dues')
@section('msg')
    hey {{ Auth::user()->name }}! here is all dues of users 🔥
@endsection

@section('main')



    <main id="dues">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search dues here ...">
            <img src="{{ asset('assets/pictures/search_icon.svg') }}" alt="">
        </div>

        <!-- users table -->

        @if ($count != 0)
            <table>
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Subscription Ended</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody id="dataList">
                        <tr>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>৳ {{ $item->price }}</td>
                            <td>{{ $item->sub_end }}</td>
                            <td>
                                <a href="{{ route('adminDue', $item->id) }}" class="button view">Details</a>
                            </td>
                        </tr>

                    </tbody>
                @endforeach
            </table>
        @else
            <p style="text-align: center">No dues</p>
        @endif
    </main>
@endsection
