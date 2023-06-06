
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adminpanel</h1>
    <h2 class="mb-4">Usermanagement</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username:</th>
                <th>E-Mail</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <a href="{{ route('admin.show', $user) }}" class="btn btn-info btn-sm">Profile </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
