<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'start_date',
        'end_date'
    ];

    public function scopeActual(Builder $query)
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now);
    }
}
