<?php

namespace App\Services;

use App\Models\Budget;
use App\Models\TransactionType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BudgetService
{
    public static function updateBudget($transactionTypeId, $amount): void
    {
        $budget = self::getOrCreateCurrentBudget();

        switch ($transactionTypeId) {
            case TransactionType::INCOME:
                $budget->increment('amount', $amount);
                break;
            case TransactionType::EXPENSE:
                $budget->decrement('amount', $amount);
                break;
        }

        $budget->save();
    }

    private static function getOrCreateCurrentBudget()
    {
        $budget = Budget::forCurrentUser()->actual()->first();

        if (is_null($budget)) {
            $previousBudget = Budget::forCurrentUser()->forPreviousBudget()->first();

            $budget = Budget::create([
                'user_id'   => Auth::user()->id,
                'amount'    => 0,
                'start_date' => $previousBudget ? $previousBudget->end_date->addDay() : Carbon::now(),
                'end_date'   => Carbon::now()->addMonth(),
            ]);

            $budget->save();
        }

        return $budget;
    }
}
