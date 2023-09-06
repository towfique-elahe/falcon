@extends('layouts.super_admin_panel')

@section('title', 'Admins List - FALCON')
@section('pageTitle', 'admins list')
@section('msg')
    hey {{ Auth::user()->name }}! all admins are here 🧑🏻‍🤝‍🧑🏿
@endsection

@section('main')
    <main id="users">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search admin here ...">
            <img src="/assets/pictures/search_icon.svg" alt="">
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
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>
                                <a href="{{ route('superAdmin', $admin->id) }}" class="button view">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center">No admins</p>
        @endif

        <!-- view modal -->
        <div class="modal_container" id="viewModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">User Details</h3>
                    <a href="javascript:void()" onclick="viewClose()" class="modal_close">
                        <img src="/assets/pictures/close.svg" alt="">
                    </a>
                </div>
                <hr>
                <!-- modal content -->
                <div class="view">
                    <dl>
                        <div class="dl">
                            <dt>Id</dt>
                            <dd>101</dd>
                        </div>
                        <div class="dl">
                            <dt>Name</dt>
                            <dd>demo</dd>
                        </div>
                        <div class="dl">
                            <dt>Email</dt>
                            <dd>demo@gmail.com</dd>
                        </div>
                        <div class="dl">
                            <dt>Phone</dt>
                            <dd>01400492967</dd>
                        </div>
                        <div class="dl">
                            <dt>User Registered</dt>
                            <dd>10 Dec, 2022</dd>
                        </div>
                        <div class="dl">
                            <dt>User Updated</dt>
                            <dd>12 Dec, 2022</dd>
                        </div>
                    </dl>
                    <img src="/assets/pictures/john-wick.jpg" alt="">
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal_container" id="editModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">Edit User Details</h3>
                    <a href="javascript:void()" onclick="editClose()" class="modal_close">
                        <img src="/assets/pictures/close.svg" alt="">
                    </a>
                </div>
                <hr>
                <!-- modal content -->
                <form action="" method="post" enctype="multipart/form-data" class="edit">
                    <div class="input">
                        <label for="id">Id</label>
                        <input type="number" name="id" id="id" value="101" disabled>
                    </div>
                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="demo">
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="demo@gmail.com">
                    </div>
                    <div class="input">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" value="01400492967">
                    </div>
                    <div class="buttons">
                        <button type="reset" class="button cancel">Cancel</button>
                        <button type="submit" class="button action">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- delete modal -->
        <div class="modal_container" id="deleteModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">Are you sure?</h3>
                    <a href="javascript:void()" onclick="deleteClose()" class="modal_close">
                        <img src="/assets/pictures/close.svg" alt="">
                    </a>
                </div>
                <hr>
                <!-- modal content -->
                <form action="" method="post" enctype="multipart/form-data" class="edit">
                    <div class="buttons">
                        <button type="reset" class="button cancel">Cancel</button>
                        <button type="submit" class="button delete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
