<section id="contact">
    <div class="container">
        <img src="{{ asset('assets/pictures/contact-section-illustration.svg') }}" alt="" class="sec_image">

        <div class="contact">
            <div>
                <h3 class="sec_heading">Contact us</h3>
                <p class="sec_sub_heading">We are here for you 24/7</p>
            </div>
            <div class="contact_info">
                <div class="info">
                    <img src="{{ asset('assets/pictures/icon-mail.svg') }}" alt="">
                    support@falcon.net
                </div>
                <div class="info">
                    <img src="{{ asset('assets/pictures/icon-call.svg') }}" alt="">
                    +8801400000000
                </div>
            </div>

            <form action="{{ route('send.mail') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="fname" id="fName" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <input type="text" name="lname" id="lName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="col">
                        <input type="tel" name="phone" id="phone" placeholder="Phone">
                    </div>
                </div>
                <textarea name="description" id="message" placeholder="Write your message..." required></textarea>
                <input type="submit" value="Send Message" class="button">
            </form>
        </div>
    </div>
</section>
