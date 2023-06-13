<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('userID', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $item->ticket = Ticket::find($item->ticketID);
            if ($item->ticket) {
                $item->event = $item->ticket->event;
                $totalPrice += $item->ticket->price * $item->quantity;
            }
            error_log('Cart item: ' . $item->id);
            error_log('Ticket: ' . ($item->ticket ? $item->ticket->id : 'null'));
            error_log('Event: ' . ($item->event ? $item->event->id : 'null'));
        }
        return view('cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }


    public function add(Ticket $ticket, Request $request)
    {
        $cartItem = new Cart;
        $cartItem->userID = Auth::id();
        $cartItem->ticketID = $ticket->id;
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Ticket added to cart.');
    }

    public function update(Cart $cartItem, Request $request)
    {
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function delete(Cart $cartItem)
    {
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
