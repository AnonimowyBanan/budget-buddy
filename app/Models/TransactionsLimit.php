<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TransactionsLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'budget_id',
        'transaction_category_id',
        'limit',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TransactionCategory::class);
    }

    public function scopeForCurrentUser(Builder $query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeCurrent(Builder $query)
    {
        return $query->where('budget_id', Budget::forCurrentUser()->actual()->first()->id);
    }
}
