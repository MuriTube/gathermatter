@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">{{ $user->name }}</h2>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.update', $user) }}" class="mb-3">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="role">Rolle</label>
                        <select name="role" class="form-control" id="role">
                            <option value="user" @if ($user->role == 'user') selected @endif>User</option>
                            <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                            <option value="organizer" @if ($user->role == 'organizer') selected @endif>Organisator</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary mt-2">Rolle aktualisieren</button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="{{ route('admin.updateProfile', $user) }}">
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

                    <button type="submit" class="btn btn-primary mt-2">Update user profile</button>
                </form>

                <form method="POST" action="{{ route('admin.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                @csrf
                @method('DELETE')

                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-danger mt-2">Delete User</button>
                    </div>
                </div>
            </form>

                <div class="mt-4">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
