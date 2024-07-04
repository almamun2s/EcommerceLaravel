@extends('frontend.layout.main_layout')
@section('title', 'Register |')

@section('main_content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Register</h3>
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
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <fieldset>
                                <input type="text" placeholder="Enter your full name" name="name" required
                                    style="text-transform: none;" value="{{ old('name') }}" autocomplete="off" />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="email" placeholder="Enter your email address" name="email" required
                                    style="text-transform: none;" value="{{ old('email') }}" autocomplete="off" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="password" name="password" style="text-transform: none;">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="password" name="password_confirmation" style="text-transform: none;">
                                <input type="submit" value="Register" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why section -->
@endsection
