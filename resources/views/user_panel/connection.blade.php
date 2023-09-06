@extends('layouts.user_panel')

@section('title', 'Connection - FALCON')
@section('pageTitle', 'connection details')
@section('msg')
    hey {{ Auth::user()->name }}! here is your connection details 😃
@endsection

@section('main')
    <main id="connection">
        @if (isset($data))
            @if ($data->sub_status == 1)
                <div class="connection_details">
                    <div class="status_card connection">
                        <img src="{{ asset('assets/pictures/connection-icon.svg') }}" alt="" class="icon">
                        <h3 class="status">Connected</h3>
                    </div>
                    <div class="status_card subscription">
                        <img src="{{ asset('assets/pictures/subscription-icon.svg') }}" alt="" class="icon">
                        <h3 class="status">{{ $data->plan }}</h3>
                    </div>
                    <div class="details">
                        <table>
                            <tr>
                                <th>Connection Status</th>
                                <td>Connected</td>
                            </tr>
                            <tr>
                                <th>Subscription Started</th>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Subscription Ends</th>
                                <td>{{ \Carbon\Carbon::parse($data->sub_end)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Speed</th>
                                @if ($data->plan == 'Basic')
                                    <td>10 mbps</td>
                                @elseif ($data->plan == 'Standard')
                                    <td>25 mbps</td>
                                @else
                                    <td>50 mbps</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Charge</th>
                                <td>৳ {{ $data->price }} /month</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
        @else
            <div class="connection_details">
                <div class="status_card connection">
                    <img src="{{ asset('assets/pictures/connection-icon.svg') }}" alt="" class="icon">
                    <div>
                        <h3 class="status">Disconnected</h3>
                        <a href="{{ route('plans') }}">Subscribe Now</a>
                    </div>
                </div>
            </div>
        @endif

        <img src="{{ asset('assets/pictures/connection-illustration.svg') }}" alt="" class="connection_img">
    </main>
@endsection
