@extends('frontend.layout.main_layout')
@section('title', 'Payment Success - ')

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-success text-center" style="padding: 3rem 0;">
                <h3>Payment Success</h3>
                <p>Paid by {{ $customer->name }}</p>
            </div>
        </div>
    </div>
@endsection
