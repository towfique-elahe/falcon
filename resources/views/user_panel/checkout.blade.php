@extends('layouts.user_panel')

@section('title', 'Checkout - FALCON')
@section('pageTitle', 'checkout')
@section('msg')
    hey {{ Auth::user()->name }}! its time to give us something 🙂
@endsection

@section('main')
    @php
        \Stripe\Stripe::setApiKey('sk_test_51MHUPEBjjjyKOVzqJG4tlAutG4sg1XCSEJxrImA0Q3o8AZ5asuOoDUa8PSc8kNnbUeKueIySbioYVVNq4burzPwb00VyB9TdQe');

        $amount = $price = $price = request('price') + (request('price') / 100) * 10;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'AED',
            'description' => 'Card Payment from FALCON',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        $stripe_key = 'pk_test_51MHUPEBjjjyKOVzqDOhXH11nVvmVfqzsxAyZ8mYS5CO3lFFXJ5azbo6T7YNOv9IaL3MmQg47KrmEDAKneLo8lAbM00tobWD384';
    @endphp
    <main id="checkout">
        <div class="card_container">
            <div class="card summary">
                <div>
                    <h3 class="heading">Order Summary</h3>
                    <p class="sub_heading">Your selected plan</p>
                </div>
                <hr>
                <div class="plan">
                    <h3 class="plan_name">{{ $name = request('name') }}
                    </h3>
                    <p class="plan_price">৳ {{ $price = request('price') }}</p>
                </div>
            </div>

            <div class="card">
                <div>
                    <h3 class="heading">Payment Details</h3>
                    <p class="sub_heading">Complete your subscription by clearing payment details</p>
                </div>
                <hr>
                {{-- <div class="payment_method">
                    <label for="">Choose Payment Method</label><br>
                    <div class="method_container">
                        <div class="method">
                            <input type="radio" name="payment_method" id="card_payment" onclick="cardPayment()">
                            <label for="card_payment">Card</label>
                        </div>
                        <div class="method">
                            <input type="radio" name="payment_method" id="bkash_payment" onclick="bkashPayment()">
                            <label for="bkash_payment">Bkash</label>
                        </div>
                        <div class="method">
                            <input type="radio" name="payment_method" id="cash_payment" onclick="cashPayment()">
                            <label for="cash_payment">Cash</label>
                        </div>
                    </div>
                </div> --}}
                <div class="payment_method">
                    <label for="">Choose Payment Method</label><br>
                    <div class="method_container">
                        <div class="method">
                            <input type="radio" name="payment_method" id="card_payment" onclick="cardPayment()">
                            <label for="card_payment">Stripe</label>
                        </div>
                        <div class="method">
                            <input type="radio" name="payment_method" id="bkash_payment" onclick="bkashPayment()">
                            <label for="bkash_payment">SSLCommerz</label>
                        </div>
                        <div class="method">
                            <input type="radio" name="payment_method" id="cash_payment" onclick="cashPayment()">
                            <label for="cash_payment">Cash</label>
                        </div>
                    </div>
                </div>


                <div class="methods card" id="methods">
                    <!-- card payment -->
                    <form action="{{ route('checkout.credit-card') }}" enctype="multipart/form-data" method="post"
                        class="card_payment" id="cardPayment">
                        @csrf

                        {{-- <input type="hidden" name="status" value=""> --}}
                        <input type="hidden" name="method" value="card">
                        <input type="hidden" name="sub_status" value="1">
                        <input type="hidden" name="plan" value="{{ $name = request('name') }}">
                        <input type="hidden" name="price" value="{{ $price = request('price') }}">
                        <input type="hidden" name="tprice" value="{{ $amount / 100 }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                        <div class="method">
                            <input type="hidden" name="payment_method" value="Card">
                        </div>
                        <div class="input">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <input type="hidden" name="amount" value="1000" />
                        <br>
                        <div class="card input">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert" style="color: crimson"></div>
                            {{-- there was name = 'plan' --}}

                        </div>
                        <div class="input">
                            <label for="bill_add">Billing Address</label>
                            <input type="text" name="billing_add" value="" id="bill_add"
                                placeholder="Billing Address" maxlength="100" required>
                        </div>
                        <br>
                        <hr>
                        <table class="pricing">

                            <tr>
                                <td>Subtotal</td>
                                <td>৳ <span>{{ $price = request('price') }}</span></td>
                            </tr>
                            <tr>
                                <td>Vat (10%)</td>
                                <td>৳ <span>{{ $price = (request('price') / 100) * 10 }}</span></td>
                            </tr>
                            <tr class="price">
                                <td>Total</td>
                                <td>৳ <span>{{ $price = request('price') + (request('price') / 100) * 10 }}</span></td>
                            </tr>
                        </table>
                        <div class="buttons">
                            <button type="reset" class="button cancel">Cancel</button>
                            <button type="submit" class="button action" id="card-button"
                                data-secret="{{ $intent }}">Pay
                                {{ $amount / 100 }}</button>
                        </div>
                    </form>

                    <!-- bkash payment -->
                    {{-- <form action="{{ route('checkout.credit-card') }}" method="post" enctype="multipart/form-data"
                        class="bkash_payment" id="bkashPayment">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="method" value="bkash">
                        <input type="hidden" name="sub_status" value="1">
                        <input type="hidden" name="plan" value="{{ $name = request('name') }}">
                        <input type="hidden" name="price" value="{{ $price = request('price') }}">
                        <input type="hidden" name="tprice" value="{{ $amount / 100 }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <div class="method">
                            <input type="hidden" name="payment_method" value="Bkash">
                        </div>
                        <div class="input">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="input">
                            <label for="card_holder">Account Number</label>
                            <input type="tel" name="b_number" value="" id="card_holder"
                                placeholder="Bkash Account Number" onKeyDown="if(this.value.length==11) return true;"
                                pattern="01+[0-9]{9}" inputMode="numeric" data-numeric required>
                        </div>
                        <div class="input">
                            <label for="card_holder">Transaction Id</label>
                            <input type="text" name="b_trans" value="" id="card_holder"
                                placeholder="Bkash Transaction Id" onKeyDown="if(this.value.length==10) return false;"
                                pattern="(?=.*[0-9])(?=.*[A-Z]).{10}" inputMode="numeric" data-numeric required>
                        </div>
                        <div class="input">
                            <label for="bill_add">Billing Address</label>
                            <input type="text" name="billing_add" id="bill_add" placeholder="Billing Address"
                                maxlength="100" required>
                        </div>
                        <br>
                        <hr>
                        <table class="pricing">
                            <tr>
                                <td>Subtotal</td>
                                <td>৳ <span>{{ $price = request('price') }}</span></td>
                            </tr>
                            <tr>
                                <td>Vat (10%)</td>
                                <td>৳ <span>{{ $price = (request('price') / 100) * 10 }}</span></td>
                            </tr>
                            <tr class="price">
                                <td>Total</td>
                                <td>৳ <span>{{ $price = request('price') + (request('price') / 100) * 10 }}</span></td>
                            </tr>
                        </table>
                        <div class="buttons">
                            <button type="reset" class="button cancel">Cancel</button>
                            <button type="submit" class="button action">Pay ৳
                                {{ $price = request('price') + (request('price') / 100) * 10 }}</button>
                        </div>
                    </form> --}}
                    <form method="post" class="bkash_payment needs-validation" id="bkashPayment" novalidate>
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="method" value="SSLCommerz">
                        <input type="hidden" name="sub_status" value="1">
                        <input type="hidden" name="plan" value="{{ $name = request('name') }}">
                        <input type="hidden" name="price" value="{{ $price = request('price') }}">
                        <input type="hidden" name="tprice" value="{{ $amount / 100 }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <div class="method">
                            <input type="hidden" name="payment_method" value="Bkash">
                        </div>
                        <div class="input">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="input">
                            <label for="bill_add">Billing Address</label>
                            <input type="text" name="billing_add" id="bill_add" placeholder="Billing Address"
                                maxlength="100">
                        </div>
                        <br>
                        <hr>
                        <table class="pricing">
                            <tr>
                                <td>Subtotal</td>
                                <td>৳ <span>{{ $price = request('price') }}</span></td>
                            </tr>
                            <tr>
                                <td>Vat (10%)</td>
                                <td>৳ <span>{{ $price = (request('price') / 100) * 10 }}</span></td>
                            </tr>
                            <tr class="price">
                                <td>Total</td>
                                <td>৳ <span>{{ $price = request('price') + (request('price') / 100) * 10 }}</span></td>
                            </tr>
                        </table>
                        <div class="buttons">
                            <button type="reset" class="button cancel">Cancel</button>
                            <button class="button action" id="sslczPayBtn" endpoint="{{ url('/pay-via-ajax') }}"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order">Pay ৳
                                {{ $price = request('price') + (request('price') / 100) * 10 }}</button>
                        </div>
                    </form>

                    <!-- cash payment -->
                    <form action="{{ route('checkout.credit-card') }}" method="post" enctype="multipart/form-data"
                        class="cash_payment" id="cashPayment">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="method" value="cash">
                        <input type="hidden" name="sub_status" value="1">
                        <input type="hidden" name="plan" value="{{ $name = request('name') }}">
                        <input type="hidden" name="price" value="{{ $price = request('price') }}">
                        <input type="hidden" name="tprice" value="{{ $amount / 100 }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <div class="method">
                            <input type="hidden" name="payment_method" value="Cash">
                        </div>
                        <div class="input">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="input">
                            <label for="card_holder">Phone Number</label>
                            <input type="tel" name="billing_phone" value="" id="card_holder"
                                placeholder="Phone Number" onKeyDown="if(this.value.length==11) return false;"
                                pattern="01+[0-9]{9}" inputMode="numeric" data-numeric required>
                        </div>
                        <div class="input">
                            <label for="bill_add">Billing Address</label>
                            <input type="text" name="billing_add" value="" id="bill_add"
                                placeholder="Billing Address" maxlength="100" required>
                        </div>
                        <br>
                        <hr>
                        <table class="pricing">
                            <tr>
                                <td>Subtotal</td>
                                <td>৳ <span>{{ $price = request('price') }}</span></td>
                            </tr>
                            <tr>
                                <td>Vat (10%)</td>
                                <td>৳ <span>{{ $price = (request('price') / 100) * 10 }}</span></td>
                            </tr>
                            <tr class="price">
                                <td>Total</td>
                                <td>৳ <span>{{ $price = request('price') + (request('price') / 100) * 10 }}</span></td>
                            </tr>
                        </table>
                        <div class="buttons">
                            <button type="reset" class="button cancel">Cancel</button>
                            <button type="submit" class="button action">Pay ৳
                                {{ $price = request('price') + (request('price') / 100) * 10 }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <img src="/assets/pictures/checkout_illustration.svg" alt="" class="illustration">
    </main>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var style = {
            base: {
                lineHeight: '18px',
                fontSize: '1rem',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: 'crimson',
                iconColor: 'crimson'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'en'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('cardPayment');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.handleCardPayment(clientSecret, cardElement, {
                    payment_method_data: {
                        //billing_details: { name: cardHolderName.value }
                    }
                })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        form.submit();
                    }
                });
        });
    </script>

    {{-- sslcommerz --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>

@endsection
