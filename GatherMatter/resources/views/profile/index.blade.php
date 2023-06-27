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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Button anzeigen, wenn der Benutzer keine Rolle 'admin' oder 'organizer' hat -->
                        @if(Auth::user()->role === 'user')
                            <div class="d-flex justify-content-center mb-4">
                                <!-- Button ist immer aktiv, wenn jedoch nicht alle Informationen ausgefüllt sind, wird eine Fehlermeldung angezeigt -->
                                <a 
                                    @if($user->firstname && $user->surname && $user->email && $user->telefon && $user->zip && $user->city && $user->address)
                                        href="mailto:getorganizer@gathermatter.io?subject=Application%20for%20Organizer&body=Dear%20GatherMatter%20Team,%0A%0AI%20am%20writing%20to%20express%20my%20interest%20in%20becoming%20an%20organizer.%20Having%20a%20passionate%20interest%20in%20creating%20and%20managing%20events,%20I%20believe%20I%20would%20be%20a%20great%20fit%20for%20this%20role.%0A%0APlease%20find%20my%20profile%20details%20for%20your%20consideration.%0A%0AName:%20{{Auth::user()->name}}%0AEmail:%20{{Auth::user()->email}}%0A%0ALooking%20forward%20to%20hearing%20from%20you.%0A%0ABest%20regards,%0A{{Auth::user()->name}}"
                                    @else 
                                        href="#" 
                                        onclick="event.preventDefault(); alert('Please fill out all personal information before applying.');" 
                                    @endif
                                    class="btn btn-success"
                                >Apply to be an organizer</a>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
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
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                       required>
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
                                    <input id="old_password" type="password"
                                           class="form-control @error('old_password') is-invalid @enderror"
                                           name="old_password" required autocomplete="current-password">
                                    <!-- Auge-Icon hinzugefügt, um das Passwort anzuzeigen/zu verbergen -->
                                    <span toggle="#old_password" class="fa fa-fw fa-eye field-icon toggle-password"
                                          style="margin-right:5px;"></span>
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
                                    <input id="password" type="password"
                                           class="form-control @error('new_password') is-invalid @enderror"
                                           name="new_password" required autocomplete="new-password">
                                    <!-- Auge-Icon hinzugefügt, um das Passwort anzuzeigen/zu verbergen -->
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"
                                          style="margin-right:5px;"></span>
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
