<?php

namespace App\Services\Staff;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    public function index($userId)
    {
        return Transaction::where('user_id', $userId)->get();
    }

    public function showDetailTransaction($transactionId)
    {
        return Transaction::with(['carts', 'user'])->where('id', $transactionId)->where('user_id', Auth::user()->id)->first();
    }

    public function checkout($total, $paid)
    {
        return Transaction::create([
            'user_id' => Auth::user()->id,
            'serial_number' => 'SN'.Transaction::count() +1,
            'total' => $total,
            'paid' => $paid,
            'change' => $paid - $total,
        ]);
    }
}
