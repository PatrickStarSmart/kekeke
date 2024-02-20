<?php

namespace App\Services\Staff;

use App\Models\Transaction;

class TransactionService
{
    public function index($userId)
    {
        return Transaction::where('user_id', $userId)->get();
    }

    public function showDetailTransaction($transactionId)
    {
        return Transaction::findOrFail($transactionId)->with(['carts']);
    }

    public function checkout(
        $userId,
        $discount,
        $total,
        $paid,
    )
    {
        return Transaction::create([
            'user_id' => $userId,
            'serial_number' => '#'.Transaction::count() +1,
            'discount' => $discount,
            'total' => $total - $discount,
            'paid' => $paid,
            'change' => $paid - ($total - $discount),
        ]);
    }
}
