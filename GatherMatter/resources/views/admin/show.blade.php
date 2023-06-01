<!-- resources/views/admin/show.blade.php -->

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

            <form method="POST" action="{{ route('admin.destroy', $user) }}">
                @csrf
                @method('DELETE')

                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Benutzer löschen</button>
                    </div>
                </div>
            </form>

            <div class="mt-4">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Zurück zur Benutzerverwaltung</a>
            </div>
        </div>
    </div>
</div>
@endsection
