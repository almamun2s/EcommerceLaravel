@extends('frontend.layout.main_layout')

@section('header_slider')
    @include('frontend.home.slider')
@endsection



@section('main_content')
    <!-- why section -->
    @include('frontend.home.why_section')
    <!-- end why section -->

    <!-- arrival section -->
    @include('frontend.home.arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('frontend.home.product')
    <!-- end product section -->

    <!-- subscribe section -->
    <section class="subscribe_section">
        <div class="container-fuild">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <h3>Subscribe To Get Discount Offers</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            <form action="">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end subscribe section -->
    <!-- client section -->
    @include('frontend.home.client')
    <!-- end client section -->
@endsection
