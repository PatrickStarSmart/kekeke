@extends('layouts.app')

@section('title', 'Detail Transaction')

@section('content')
@include('components.navbar-staff')
<div class="container mx-auto px-4">
    <div class="card my-5 border-0 shadow-sm">
        <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
            <h5 class="card-title mb-0 font-weight-bold">Detail Transaction No: {{ $transactions->serial_number}}</h5>
            <span class="text-secondary fw-bold">Staff: {{ $transactions->user->username}}</span>
        </div>
        <div class="card-body table-responsive p-4">
            <table class="table table-striped table-hover table-bordered" style="font-size: 0.9rem;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions->carts as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp {{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->sub_total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-between align-items-center border-top pt-3">
                <div class="text-start fw-bold">
                    Total: Rp {{ number_format($transactions->total, 2) }}
                </div>
                <div class="text-end fw-bold text-success">
                    Paid: Rp {{ number_format($transactions->paid, 2) }}
                </div>
                <div class="text-end fw-bold text-danger">
                    Change: Rp {{ number_format($transactions->change, 2) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
