<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use App\Services\BudgetService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransactionsController extends Controller
{
    public function viewAdd(): View
    {
        return view('transaction.form', [
            'transactionCategories' => TransactionCategory::all(),
            'transactionTypes'      => TransactionType::all(),
        ]);
    }

    public function add(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'transaction_category_id' => ['required'],
            'transaction_type_id'     => ['required'],
            'amount'                  => ['required', 'numeric', 'min:0'],
        ]);

        DB::transaction(function () use ($request) {
            $transaction = Transaction::create([
                'user_id'           => Auth::user()->id,
                'category_id'       => $request->transaction_category_id,
                'type_id'           => $request->transaction_type_id,
                'amount'            => $request->amount,
                'transaction_date'  => $request->transaction_date
            ]);

            $transaction->save();

            BudgetService::updateBudget($request->transaction_type_id, $request->amount);

        });

        return redirect()->route('home');
    }
}
