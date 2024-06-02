<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransactionsController extends Controller
{
    public function add(): View
    {
        return view('transaction.form', [
            'transactionCategories' => TransactionCategory::all(),
            'transactionTypes'      => TransactionType::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_category_id' => ['required'],
            'transaction_type_id'     => ['required'],
            'amount'                  => ['required', 'numeric', 'min:0'],
        ]);

        DB::transaction(function () use ($request) {
            $transaction = new Transaction();
            $transaction->create([
                'transaction_category_id' => $request->transaction_category_id,
                'transaction_type_id'     => $request->transaction_type_id,
                'amount'                  => $request->amount,
                'transaction_date'        => $request->transaction_date,
            ]);
            $transaction->save();

            if ($request->transaction_category_id == config('constants.transaction_category.income')) {
                $budget = Budget::actual()->first();
            }
        });
    }
}
