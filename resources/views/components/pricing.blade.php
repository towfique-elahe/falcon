<section id="pricing">
    <div class="container">
        <h3 class="sec_heading">choose your plan</h3>
        <p class="sec_sub_heading">Our pricing is specially designed for you</p>

        <div class="plan_container">
            <!-- basic plan -->
            <div class="plan basic">
                <h4 class="plan_title">{{ $plan1->name }}</h4>

                <table>
                    <tr>
                        <td class="plan_speed">15 <span>mbps</span></td>
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
                    <tr>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td class="plan_price">৳ <span>{{ $plan1->price }}</span> /month</td>
                    </tr>
                </table>

                <a href="{{ route('plans') }}" class="action button">Get Started</a>
            </div>

            <!-- standard plan -->
            <div class="plan standard">
                <h4 class="plan_title">{{ $plan2->name }}</h4>

                <table>
                    <tr>
                        <td class="plan_speed">25 <span>mbps</span></td>
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
                    <tr>
                        <td class="plan_price">৳ <span>{{ $plan2->price }}</span> /month</td>
                    </tr>
                </table>

                <a href="{{ route('plans') }}" class="action button">Get Started</a>
            </div>
            <!-- premium plan -->
            <div class="plan premium">
                <h4 class="plan_title">{{ $plan3->name }}</h4>

                <table>
                    <tr>
                        <td class="plan_speed">50 <span>mbps</span></td>
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
                    <tr>
                        <td class="plan_price">৳ <span>{{ $plan3->price }}</span> /month</td>
                    </tr>
                </table>

                <a href="{{ route('plans') }}" class="action button">Get Started</a>
            </div>
        </div>
    </div>
</section>
