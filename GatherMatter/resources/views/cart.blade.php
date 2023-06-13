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
                        <ul class="list-group">
                            @foreach($cartItems as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Event: {{ $item->ticket->event->title }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Ticket Tier: {{ $item->ticket->tier }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
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
                                </li>
                            @endforeach
                        </ul>
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

