<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transaction', compact('transactions'));
    }

    public function show($transactionId)
    {
        $transactions = Transaction::findOrFail($transactionId);

        $transactions->with([
            'carts',
            'user',
        ]);

        return view('', compact('transactions'));
    }
}
