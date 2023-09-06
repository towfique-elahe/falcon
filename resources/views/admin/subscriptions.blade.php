@extends('layouts.admin_panel')

@section('title', 'Subscriptions - FALCON')
@section('pageTitle', 'Subscriptions')
@section('msg')
    hey {{ Auth::user()->name }}! here is subscriptions 📃
@endsection

@section('main')



    <main id="subscriptions">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search subscription details here ...">
            <img src="{{ asset('assets/pictures/search_icon.svg') }}" alt="">
        </div>

        <!-- users table -->

        <table>
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Plan</th>
                    <th>Price</th>
                    <th>Ends</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($data as $item)
                <tbody id="dataList">
                    <tr>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->plan }}</td>
                        <td>৳ {{ $item->price }}</td>
                        <td>{{ $item->sub_end }}</td>
                        <td>
                            <a href="{{ route('adminSubscription', $item->id) }}" class="button view">Details</a>
                        </td>
                    </tr>

                </tbody>
            @endforeach

        </table>
    </main>
@endsection
