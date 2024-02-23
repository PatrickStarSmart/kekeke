<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        $incomes = $transactions->sum('total');
        
        $count = $transactions->count();

        $carts = Cart::with('product')->whereNotNull('transaction_id');

        $sold = $carts->sum('qty');

        $staff = User::whereRole('staff')->count();

        return view('admin.dashboard', compact(
            'incomes',
            'percentageIncomes',
            'count',
            'sold',
            'staff',
        ));
    }
}
