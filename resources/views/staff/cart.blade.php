@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    @include('components.navbar-staff')
    @if (session('success'))
        <div id="successMessage" class="alert alert-success alert-dismissible fade container w-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 2000);
        </script>
    @elseif (session('error'))
        <div id="errorMessage" class="alert alert-error alert-dismissible fade container w-auto" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('errorMessage').style.display = 'none';
            }, 2000);
        </script>
    @endif
    <div class="container mx-auto px-4">
        <div class="card my-5 border-0 shadow-sm">
            <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
                <h5 class="card-title mb-0 font-weight-bold">Cart List</h5>
                <span class="text-secondary">Staff: {{ $user->username }}</span>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->product->name }}</td>
                                <td>Rp {{ number_format($item->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('update.carts', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="number" class="form-control" name="qty"
                                                value="{{ $item->qty }}" required>
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </td>
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
                    <div class="text-start fw-bold">
                        <label class="form-label">Total Items: {{ $total_items }}</label>
                    </div>
                    <div class="text-center fw-bold">
                        Total: Rp {{ number_format($total, 2) }}
                    </div>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="text-end col-2 w-auto">
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="paid" placeholder="Input Paid" required>
                            </div>
                            @error('paid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" class="btn btn-primary mt-2">
                                Checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
