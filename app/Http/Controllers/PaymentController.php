<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        $carts = session()->get('cart');
        $totalCart = [];
        foreach ($carts as $cart) {
            $sum = $cart['price'] * $cart['quantity'];
            array_push($totalCart, $sum);
        }
        $totalCart = array_sum($totalCart);
        return view('shop.cart.cart', compact('carts', 'totalCart'));
    }

    public function store(Payment $payment, PaymentRequest $request)
    {
        $carts = session()->get('cart');
        $name = [];
        $quantity = [];
        $totalCart = [];
        foreach ($carts as $pro) {
            array_push($name, $pro['name']);
            array_push($quantity, $pro['quantity']);
            $sum = $pro['price'] * $pro['quantity'];
            array_push($totalCart, $sum);
        }
        $totalCart = array_sum($totalCart);
        $totalPayment = strval($totalCart);
        $userId = auth()->user()->id;
        $payment->user_id = $userId;
        $payment->product_name = implode(', ', $name);;
        $payment->quantity = implode(', ', $quantity);;
        $payment->total_payment = $totalPayment;;
        $payment->recipient_name = $request->name;
        $payment->recipient_phone = $request->phone_number;
        $payment->recipient_address = $request->address;
        dd($payment->user->phone);
        $payment->save();
        toastr()->success('thanh toan thanh coong');
        $carts = [];
        session()->put('cart', $carts);
        return redirect()->route('shop.cart');
    }

    public function getList()
    {
        $payment = Payment::all();
        return view('shop.payment.payment-history',compact('payment'));
    }
}
