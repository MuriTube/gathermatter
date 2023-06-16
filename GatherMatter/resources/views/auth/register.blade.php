@extends('layouts.app')
@section('content')
<div class="container py-5">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="row mb-3">
                     <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                     <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- Neue Fehlermeldung für den bereits vorhandenen Benutzernamen -->
                        @if ($errors->has('duplicate_name'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('duplicate_name') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                     <div class="col-md-6 position-relative">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <!-- Auge-Icon hinzugefügt, um das Passwort anzuzeigen/zu verbergen -->
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                        <!-- Passwortstärke-Balken hinzugefügt -->
                        <div class="progress-bar mt-1">
                           <div class="progress-bar-fill" id="passwordStrength"></div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>
                  </div>
                  <div class="row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection