@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card border-0 shadow-sm" style="max-width: 400px;">
            <div class="card-body py-5">
                <h2 class="text-center mb-4">Tokoku Login</h2>
                <form class="row g-3 needs-validation" action="{{ route('login.user') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="inputPIN" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPIN" placeholder="Password"
                            required>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
