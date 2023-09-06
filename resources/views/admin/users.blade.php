@extends('layouts.admin_panel')

@section('title', 'Users - FALCON')
@section('pageTitle', 'users list')
@section('msg')
    hey {{ Auth::user()->name }}! all users are here 🧑🏻‍🤝‍🧑🏼
@endsection

@section('main')
    <main id="users">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search user here ...">
            <img src="{{ asset('assets/pictures/search_icon.svg') }}" alt="">
        </div>

        <!-- users table -->
        @if ($count != 0)
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="dataList">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ route('adminUser', $user->id) }}" class="button view">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center">No users</p>
        @endif
    </main>
@endsection
