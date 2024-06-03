<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function home()
    {
        return view('home', [
            'budget'    => Budget::forCurrentUser()
                ->actual()
                ->first(),
            'transactions'  => Transaction::forCurrentUser()
                ->get()
        ]);
    }
}
