@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">{{ __('Payment Cancelled') }}</div>

                    <div class="card-body">
                        <p>Your payment has been cancelled. If you have any issues, please contact us.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary">Return Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
