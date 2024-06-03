<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'type_id',
        'amount',
        'transaction_date'
    ];

    public function scopeForCurrentUser(Builder $query): Builder
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeActual(Builder $query): Builder
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now);
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TransactionCategory::class);
    }
}
