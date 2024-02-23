@extends('layouts.app')

@section('title', 'History')

@section('content')
    @include('components.navbar-admin')
    <div class="container mx-auto px-4">
        <div class="card my-5 border-0 shadow-sm">
            <div class="card-header d-flex flex-row justify-content-between align-items-center bg-light">
                <h3 class="card-title mb-0">Transaction List</h3>
                <a href="{{ route('export') }}" id="download_report_link" class="btn btn-primary download-button">
                    <i class="bi bi-download"></i> Download Report
                </a>
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
                                <a type="button" class="btn btn-sm btn-info" href="{{ route('show.transactions', $item->id) }}">
                                    <i class="bi bi-folder2-open"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
