@extends('frontend.layout.main_layout')
@section('title', 'Login |')

@section('main_content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Login</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="full">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <fieldset>
                                <input type="email" placeholder="Enter your email address" name="email" required
                                    style="text-transform: none;" autocomplete="off" />
                                <input type="password" name="password" style="text-transform: none;">
                                <input type="submit" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why section -->
@endsection
