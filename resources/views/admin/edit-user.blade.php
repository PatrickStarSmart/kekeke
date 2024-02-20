@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
    @include('components.navbar-admin')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update.users', $users->id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="name"
                                value="{{ $users->username }}" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="forPin" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="forPin" name="password"
                                placeholder="Optional">
                        </div>

                        <div class="col-md-6">
                            <label for="userRole" class="form-label">Role</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                <option selected>{{ $users->role }}</option>
                                <option value="staff">Staff</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
