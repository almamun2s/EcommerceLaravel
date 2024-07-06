<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Order;
use App\Enum\OrderStatus;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $products = Cart::content();
        $lineItems = [];
        foreach ($products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->qty,

            ];
        }

        $checkout_session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = OrderStatus::UNPAID;
        $order->total_price = Cart::total();
        $order->session_id = $checkout_session->id;
        $order->save();


        return redirect($checkout_session->url);
    }


    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session_id = $request->get('session_id');


        try {
            $session = Session::retrieve($session_id);
            if (!$session) {
                throw new NotFoundHttpException();
            }
            $customer = $session->customer_details;

            $order = Order::where('session_id', $session_id)->first();
            if (!$order) {
                abort(404);
            }
            if ($order->status == OrderStatus::UNPAID) {
                $order->status = OrderStatus::PAID;
                $order->save();
            }

            return view('frontend.checkout.success', compact('customer'));


        } catch (Exception $exception) {
            throw new NotFoundHttpException();
        }

    }

    public function cancel()
    {
        return view('frontend.checkout.cancel');
    }

    public function webhook()
    {

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $order = Order::where('session_id', $session->id)->first();
                if ($order && $order->status = OrderStatus::UNPAID) {
                    $order->status = OrderStatus::PAID;
                    $order->save();
                    // Send user an email as needed
                }


            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
