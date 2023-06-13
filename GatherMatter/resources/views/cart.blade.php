@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Shopping Cart</h5>
                        @if(count($cartItems) > 0)
                            <div class="list-group">
                                @foreach($cartItems as $item)
                                    <div class="list-group-item mb-3 p-3 shadow">
                                        @if($item->ticket && $item->ticket->event)
                                            <p>Event: {{ $item->ticket->event->title }}</p>
                                            <p>Ticket: {{ $item->ticket->tier }}</p>
                                            <p>Quantity: {{ $item->quantity }}</p>
                                            <p>Price: €{{ $item->ticket->price * $item->quantity }}</p>
                                        @else
                                            <p>Error: Ticket or event not found for this cart item.</p>
                                        @endif
                                        <div class="text-end">
                                            <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="form-control d-inline" style="width: 70px;">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            <form action="{{ route('cart.delete', $item) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-end mt-3">
                                <a href="{{ route('payment.initiate') }}" class="btn btn-success">Proceed to Payment</a>
                            </div>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
