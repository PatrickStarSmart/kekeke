<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transaction', compact('transactions'));
    }

    public function show($transactionId)
    {
        $transactions = Transaction::with([
            'carts',
            'user',
        ])
        ->where('id', $transactionId)
        ->first();

        return view('admin.transaction-detail', compact('transactions'));
    }

    public function export()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }
}
