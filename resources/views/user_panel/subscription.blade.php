@extends('layouts.user_panel')

@section('title', 'Subscription - FALCON')
@section('pageTitle', 'subscription details')
@section('msg')
    hey {{ Auth::user()->name }}! here is subscription details 😊
@endsection

@section('main')
    <main id="subscription">
        @if (isset($data))
            @if ($data->sub_status == 1)
                <div class="card_container">
                    <div class="card plan">
                        <h3 class="plan_name">{{ $data->plan }}</h3>
                        <div>
                            <p>Started <span>{{ \Carbon\Carbon::parse($data->created_at)->format('d M, Y') }}</span></p>
                            <p>Ends <span>{{ \Carbon\Carbon::parse($data->sub_end)->format('d M, Y') }}</span></p>
                            <a href="{{ route('plans') }}">
                                <span>Change Plan</span>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <h3 class="heading">Details</h3>
                        <table>
                            @if ($data->plan == 'Basic')
                                <tr>
                                    <td class="plan_speed">Speed: <span>15 mbps</span></td>
                                </tr>
                                <tr>
                                    <td>15 mbps speed / Off-Peak</td>
                                </tr>
                                <tr>
                                    <td>10 mbps speed / Peak</td>
                                </tr>
                                <tr>
                                    <td>24/7 Support</td>
                                </tr>
                            @elseif ($data->plan == 'Standard')
                                <tr>
                                    <td class="plan_speed">Speed: <span>25 mbps</span></td>
                                </tr>
                                <tr>
                                    <td>25 mbps speed / Off-Peak</td>
                                </tr>
                                <tr>
                                    <td>20 mbps speed / Peak</td>
                                </tr>
                                <tr>
                                    <td>24/7 Support</td>
                                </tr>
                                <tr>
                                    <td>100 mbps Youtube</td>
                                </tr>
                                <tr>
                                    <td>100 mbps Facebook</td>
                                </tr>
                            @else
                                <tr>
                                    <td class="plan_speed">Speed: <span>50 mbps</span></td>
                                </tr>
                                <tr>
                                    <td>50 mbps speed / Off-Peak</td>
                                </tr>
                                <tr>
                                    <td>30 mbps speed / Peak</td>
                                </tr>
                                <tr>
                                    <td>24/7 Support</td>
                                </tr>
                                <tr>
                                    <td>100 mbps Youtube</td>
                                </tr>
                                <tr>
                                    <td>100 mbps Facebook</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="plan_price">৳ <span> {{ $data->price }}</span> /month</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
        @else
            <div class="card plan">
                <h3 class="plan_name">You have not Purchased any Plan!</h3>
                <div>
                    <a class="button action" href="{{ route('plans') }}">
                        <span>Choose Plan</span>
                    </a>
                </div>
            </div>
        @endif

        <img src="{{ asset('assets/pictures/subscription_illustration.svg') }}" alt="" class="illustration">
    </main>
@endsection
