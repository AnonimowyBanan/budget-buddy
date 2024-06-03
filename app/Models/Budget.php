<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'start_date',
        'end_date'
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

    public function scopeForPreviousBudget(Builder $query): Builder
    {
        return $query->where('end_date', '<', Carbon::now())
            ->orderBy('end_date', 'desc')
            ->limit(1);
    }
}
