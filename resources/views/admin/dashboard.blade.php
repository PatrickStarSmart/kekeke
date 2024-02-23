@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @include('components.navbar-admin')
    @if (session('success'))
        <div id="successMessage" class="alert alert-success alert-dismissible fade container" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 2000);
        </script>
    @endif
    <div class="container mx-auto px-4">
        <div class="row my-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Total Incomce</div>
                    <div class="card-body">
                        <h1>{{ number_format($incomes, 2) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Transaction Total</div>
                    <div class="card-body">
                        <h1>{{ $count }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Total Product Sold</div>
                    <div class="card-body">
                        <h1>{{ $sold }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Staff</div>
                    <div class="card-body">
                        <h1>{{ $staff }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
