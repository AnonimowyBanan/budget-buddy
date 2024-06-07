<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\TransactionCategory;
use App\Models\TransactionsLimit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TransactionsLimitController extends Controller
{
    public function viewAdd(): View
    {
        return view('transaction.limit.form', [
            'transactionCategories' => TransactionCategory::all()
        ]);
    }

    public function add(Request $request): RedirectResponse
    {
        TransactionsLimit::updateOrCreate(
            [
                'user_id'   => Auth::user()->id,
                'budget_id' => Budget::forCurrentUser()->actual()->first()->id
            ],
            [
                'transaction_category_id' => $request->transaction_category_id,
                'limit'                   => $request->limit,
            ]
        );

        return redirect()->route('home');
    }
}
