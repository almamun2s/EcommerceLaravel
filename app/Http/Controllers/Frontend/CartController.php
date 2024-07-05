<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    /**
     * showing cart page
     */
    public function show_cart()
    {
        $items = Cart::content();
        // dd($items);
        return view('frontend.cart', compact('items'));
    }

    /**
     * Add product to cart
     */
    public function add_to_cart(Product $product)
    {
        Cart::add($product->id, $product->name, 1, $product->price);

        // Cart::add($product->id, );

        return redirect()->route('cart');
    }


    public function add_qty($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
        return redirect()->back();
    }


    public function sub_qty($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
        return redirect()->back();
    }

    public function remove_from_cart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

}
