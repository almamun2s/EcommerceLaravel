@extends('frontend.layout.main_layout')
@section('title', 'Cart - ')

@section('main_content')
    <div class="container" style="padding: 3rem 0;">
        <div class="row">
            <div class="col-md-12">
                @if ($items->count() > 0)

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($items as $item)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        @if (!($item->qty == 1))
                                            <a class="btn btn-info" href="{{ route('cart.sub_qty', $item->rowId) }}">-</a>
                                        @endif
                                        <span style="display: inline-block; padding: 0 1rem;">{{ $item->qty }}</span>
                                        <a class="btn btn-success" href="{{ route('cart.add_qty', $item->rowId) }}">+</a>
                                    </td>
                                    <td>${{ $item->subtotal() }} <a class="btn btn-danger"
                                            href="{{ route('cart.remove', $item->rowId) }}">x</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="border-top: 5px solid #ddd;">
                                <td colspan="3">&nbsp;</td>
                                <td>Subtotal</td>
                                <td>${{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Total</td>
                                <td>$<?php echo Cart::total(); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <h5 class="text-center">No items in cart</h5>

                @endif
            </div>
        </div>
    </div>
@endsection
