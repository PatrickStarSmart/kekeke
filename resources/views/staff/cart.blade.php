@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    @include('components.navbar-staff')

    <div class="container mx-auto px-4">
        <div class="card my-5 border-0 shadow-sm">
            <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
                <h5 class="card-title mb-0 font-weight-bold">Cart List</h5>
                <span class="text-secondary">Staff: Kasir</span> </div>
            <div class="card-body table-responsive p-4">
                <table class="table table-striped table-hover table-bordered" style="font-size: 0.9rem;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->product->name }}</td>
                                <td>Rp {{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp {{ number_format($item->sub_total, 2) }}</td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-danger"
                                       href="{{ route('delete.carts', $item->id) }}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 d-flex justify-content-between align-items-center border-top pt-3">
                    <div class="text-muted">
                        {{-- @if ($discount > 0)
                            <br><span>Discount:</span> Rp {{ number_format($discount, 2) }}
                        @endif --}}
                    </div>
                    <div class="text-end fw-bold">
                        Total: Rp 10000
                    </div>
                    <a href="#" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
