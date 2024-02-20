@extends('layouts.app')

@section('title', 'History')

@section('content')
    @include('components.navbar-staff')

    <div class="container mx-auto px-4">
        <div class="card my-5 border-0 shadow-sm">
            <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
                <h5 class="card-title mb-0 font-weight-bold">Transaction List</h5>
            </div>
            <div class="card-body table-responsive p-4">
                <table class="table table-striped table-hover table-bordered" style="font-size: 0.9rem;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Time</th>
                            <th scope="col">Total</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>Rp {{ number_format($item->total, 2) }}</td>
                                <td>
                                    <i class="bi bi-folder2-open"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
