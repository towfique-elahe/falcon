@extends('layouts.admin_panel')

@section('title', 'Connections - FALCON')
@section('pageTitle', 'Connections')
@section('msg')
    hey {{ Auth::user()->name }}! here is all connection of users 🔥
@endsection

@section('main')
    <main id="connections">
        <!-- search bar -->
        <div class="search_bar">
            <input id="searchBar" type="text" placeholder="Search connection details here ...">
            <img src="{{ asset('assets/pictures/search_icon.svg') }}" alt="">
        </div>

        <!-- users table -->
        <table>
            <thead>
                <tr>
                    <th>Subscription Id</th>
                    <th>Plan</th>
                    <th>Ends</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="dataList">
                <tr>
                    <td>101</td>
                    <td>Basic</td>
                    <td>11 Nov, 2022</td>
                    <td>Disconnect</td>
                    <td>
                        <a href="javascript:void()" onclick="viewOpen()" class="button view">Details</a>
                        <a href="javascript:void()" onclick="deleteOpen()" class="button delete">Connection</a>
                        <a href="tel:01400492967" class="button">Call</a>
                    </td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Standard</td>
                    <td>11 Jan, 2023</td>
                    <td>Connected</td>
                    <td>
                        <a href="javascript:void()" onclick="viewOpen()" class="button view">Details</a>
                        <a href="javascript:void()" onclick="deleteOpen()" class="button delete">Connection</a>
                        <a href="tel:01400492967" class="button">Call</a>
                    </td>
                </tr>
                <tr>
                    <td>103</td>
                    <td>Premium</td>
                    <td>11 Jan, 2023</td>
                    <td>Connected</td>
                    <td>
                        <a href="javascript:void()" onclick="viewOpen()" class="button view">Details</a>
                        <a href="javascript:void()" onclick="deleteOpen()" class="button delete">Connection</a>
                        <a href="tel:01400492967" class="button">Call</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- details modal -->
        <div class="modal_container" id="viewModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">Connection Details</h3>
                    <a href="javascript:void()" onclick="viewClose()" class="modal_close">
                        <img src="{{ asset('assets/pictures/close.svg') }}" alt="">
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
                            <dt>Subscription Id</dt>
                            <dd>1024</dd>
                        </div>
                        <div class="dl">
                            <dt>Subscription Started</dt>
                            <dd>11 Nov, 2022</dd>
                        </div>
                        <div class="dl">
                            <dt>Subscription Ends</dt>
                            <dd>11 Dec, 2022</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- connection modal -->
        <div class="modal_container" id="deleteModal">
            <div class="modal">
                <div class="modal_top">
                    <h3 class="modal_heading">Conn Status</h3>
                    <a href="javascript:void()" onclick="deleteClose()" class="modal_close">
                        <img src="{{ asset('assets/pictures/close.svg') }}" alt="">
                    </a>
                </div>
                <!-- modal content -->
                <div class="buttons">
                    <a href="javascript:void()" class="button delete">Disconnect</a>
                    <a href="javascript:void()" class="button action">Connect</a>
                </div>
            </div>
        </div>
    </main>
@endsection
