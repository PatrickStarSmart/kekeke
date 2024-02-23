<?php

namespace App\Http\Controllers\Staff;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Staff\TransactionService;
use App\Http\Requests\TransactionPostRequest;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->index(Auth::user()->id);

        return view('staff.transaction', compact('transactions'));
    }

    public function show($transactionId)
    {
        $transactions = $this->transactionService->showDetailTransaction($transactionId);

        return view('staff.transaction-detail', compact('transactions'));
    }

    public function checkout(TransactionPostRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();

            $transactions = $this->transactionService->checkout($validated['total'], $validated['paid']);

            $carts = Cart::whereNull('transaction_id')->where('user_id', Auth::user()->id)->get();

            foreach ($carts as $cart) {
                $products = Product::where('id', $cart->product_id)->first();
                $products->stock = $products->stock - $cart->qty;
                $products->save();
            }

            Cart::whereNull('transaction_id')->where('user_id', Auth::user()->id)->update([
                'transaction_id' => $transactions->id,
            ]);

            DB::commit();
            return redirect()->route('histories')->with('success', 'Checkout successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th);
        }
    }
}
