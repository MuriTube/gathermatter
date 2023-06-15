@extends('layouts.app')

@section('content')
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{ count($cartItems) }} items</h6>
                                        </div>
                                        <hr class="my-4">
                                        <!-- Cart Headers -->
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <h6 class="text-black mb-0">Items</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-black mb-0"></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2">
                                                <h6 class="text-black mb-0">Price each</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2">
                                                <h6 class="text-black mb-0">Quantity</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="text-black mb-0">Subtotal</h6>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        @foreach($cartItems as $item)
                                            <div class="row mb-4 d-flex align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    @if($item->ticket->event->image_path)
                                                        <img src="{{ asset('storage/' . $item->ticket->event->image_path) }}" class="img-fluid rounded-3" alt="Event Image">
                                                    @endif
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black mb-0">{{ $item->ticket->event->title }}</h6>
                                                    <h6 class="text-muted">{{ $item->ticket->tier }}</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 class="text-black mb-0"> € {{ $item->ticket->price }}</h6> <!-- Individual Ticket Price -->
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                                        @csrf                                                        @method('PUT')
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    </form>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 class="mb-0">€ {{ $item->ticket->price * $item->quantity }}</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <form action="{{ route('cart.delete', $item) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-muted"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{ route('events.index') }}" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">items {{ count($cartItems) }}</h5>
                                            <h5>€ {{ $totalPrice }}</h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Checkout</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
