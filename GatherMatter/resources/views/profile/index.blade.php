@extends('layouts.app')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ $user->name }}'s profile</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                     <label class="form-label">Username</label>
                     <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Firstname</label>
                     <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Surname</label>
                     <input type="text" class="form-control" name="surname" value="{{ $user->surname }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Telefon</label>
                     <input type="text" class="form-control" name="telefon" value="{{ $user->telefon }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Zip-code</label>
                     <input type="text" class="form-control" name="zip" value="{{ $user->zip }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">City</label>
                     <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Address</label>
                     <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Save profile changes</button>
                  <hr>
                  <br>
               </form>
               <form method="POST" action="{{ route('profile.updatePassword') }}">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                     <label class="form-label">Old Password</label>
                     <div class="position-relative">
                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password">
                        <!-- Auge-Icon hinzugefügt, um das Passwort anzuzeigen/zu verbergen -->
                        <span toggle="#old_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">New Password</label>
                     <div class="position-relative">
                        <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                        <!-- Auge-Icon hinzugefügt, um das Passwort anzuzeigen/zu verbergen -->
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right:5px;"></span>
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <!-- Passwortstärke-Balken hinzugefügt -->
                     <div class="progress-bar mt-1">
                        <div class="progress-bar-fill" id="passwordStrength"></div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Confirm New Password</label>
                     <input type="password" class="form-control" name="new_password_confirmation">
                  </div>
                  <button type="submit" class="btn btn-primary">Update Password</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection