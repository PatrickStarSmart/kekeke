@extends('layouts.app')

@section('title', 'Product')

@section('content')
    @include('components.navbar-admin')
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
    @endif
    <div class="container mx-auto px-4">
        <div class="card my-5 border-0 shadow-sm">
            <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
                <h5 class="card-title mb-0 font-weight-bold">Products List</h5>
                <a href="{{ route('add.products') }}" class="btn btn-primary">New Product</a>
            </div>
            <div class="card-body table-responsive p-4">
                <table class="table table-striped table-hover table-bordered" style="font-size: 0.9rem;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>Rp {{ number_format($item->price, 2) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a type="button" href="{{ route('edit.products', $item->id) }}"
                                            class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Edit Product">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a type="button" class="btn btn-sm btn-danger"
                                            href="{{ route('delete.products', $item->id) }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
