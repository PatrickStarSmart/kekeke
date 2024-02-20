@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    @include('components.navbar-admin')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add New Product</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store.products') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Input product name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="productPrice" name="price"
                                    placeholder="0.00" required>
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock Produk</label>
                            <input type="number" name="stock" class="form-control" id="stock" min="0"
                                placeholder="Input product stock" required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
