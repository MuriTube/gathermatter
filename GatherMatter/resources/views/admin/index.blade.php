@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="my-4">Adminpanel</h1>
        <h2 class="mb-4">Usermanagement</h2>
        
        <div class="container">
            <div class="row mb-4">
                <!-- Suchfeld -->
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span style="height:38px;" class="input-group-text" id="search-addon"><i  class="fas fa-search"></i></span>
                        </div>
                        <input type="text" id="search" placeholder="Search users..." class="form-control" aria-describedby="search-addon">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Dropdown-Menü für Sortieroptionen -->
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span style="height:38px;"  class="input-group-text" id="sort-addon"><i class="fas fa-filter"></i></span>
                        </div>
                        <select id="sort" class="form-control custom-select" aria-describedby="sort-addon">
                            <option value="">Sort by Username...</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
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
                    <th>Created</th> <!-- Neue Spalte für das Registrierungsdatum -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="userTableBody">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>{{ $user->created_at->format('d.m.Y') }}</td> <!-- Anzeige des Registrierungsdatums -->
                        <td>
                            <a href="{{ route('admin.show', $user) }}" class="btn btn-info btn-sm">Profile </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection