<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function initiate()
    {
        $cartItems = Cart::where('userID', Auth::id())->where('status', 'open')->get();

        if (count($cartItems) > 0) {
            $totalAmount = 0;

            foreach ($cartItems as $item) {
                $totalAmount += $item->ticket->price * $item->quantity;
                $item->status = 'closed';
                $item->save();
            }

            $payment = new Payment;
            $payment->userID = Auth::id();
            $payment->amount = $totalAmount;
            $payment->status = 'in progress';
            $payment->save();

            return redirect()->route('payment.show', $payment)->with('success', 'Payment initiated.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
    }
}
