@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transaction Details</div>

                    <div class="card-body">
                        <p>Transaction ID: {{ $transaction->id }}</p>
                        <p>Transaction Amount: {{ $transaction->amount }}</p>
                        <p>Transaction Status: {{ $transaction->status }}</p>
                        <p>Transaction Date: {{ $transaction->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
