@extends('layouts.user_panel')

@section('title', 'Complain - FALCON')
@section('pageTitle', 'complain')
@section('msg')
    hey {{ Auth::user()->name }}! here you can Complain to falcon ⚠️
@endsection

@section('main')
    <main id="complain">
        <form action="{{ route('store_complain') }}" method="post" class="complain_card" id="complainForm">
            @csrf
            <div class="input">
                <input type="text" name="user_id" id="" value="{{ Auth::user()->id }}" readonly required hidden>
            </div>
            <div class="input">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly required>
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" readonly required>
            </div>
            <div class="input">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone }}" readonly required>
            </div>
            <div class="input">
                <label for="complain">Complain</label>
                <textarea name="description" id="complain" placeholder="Share your complain with falcon 🙂" required autofocus></textarea>
            </div>
            <hr>
            <div class="buttons">
                <button class="button cancel" type="reset">Cancel</button>
                <button class="button action" type="submit">Submit</button>
            </div>
            <p id="message"></p>
        </form>

        <img class="illustration" src="{{ asset('assets/pictures/complain_illustration.svg') }}" alt="">
    </main>

    <script>
        document.getElementById('complainForm').addEventListener('submit', function(event) {
            alert('Form submitted successfully!');
        });
    </script>
@endsection
