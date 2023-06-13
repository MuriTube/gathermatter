<?php
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
                        <h5 class="card-title">Payment</h5>
                        <p>Amount: {{ $payment->amount }}</p>
                        <p>Status: {{ $payment->status }}</p>
                        <p>Method: {{ $payment->method }}</p>
                        <p>Paid at: {{ $payment->paid_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
