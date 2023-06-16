@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('Payment Successful') }}</div>

                    <div class="card-body">
                        <p>Your payment has been processed successfully. Thank you for your purchase!</p>
                        <a href="{{ url('/') }}" class="btn btn-primary">Return Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
