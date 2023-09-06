@extends('layouts.admin_panel')

@section('title', 'Complains - FALCON')
@section('pageTitle', 'Complains list')
@section('msg')
    hey {{ Auth::user()->name }}! all complains are here 🧑🏻‍🤝‍🧑🏼
@endsection

@section('main')
    <main id="users">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search complains here ...">
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
                    @foreach ($complains as $complain)
                        <tr>
                            <td>{{ $complain->id }}</td>
                            <td>{{ $complain->name }}</td>
                            <td>{{ $complain->email }}</td>
                            <td>{{ $complain->phone }}</td>
                            <td>
                                <a href="{{ route('adminComplain', $complain->id) }}" class="button view">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center">No complains</p>
        @endif
    </main>
@endsection
