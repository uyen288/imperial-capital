<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Performance extends Model
{
    protected $fillable = [
        'fund_id',
        'date',
        'nav',
        'one_month',
        'three_month',
        'one_year',
        'three_year',
        'ytd',
    ];

    protected $casts = [
        'date'        => 'date',
        'nav'         => 'decimal:2',
        'one_month'   => 'decimal:2',
        'three_month' => 'decimal:2',
        'one_year'    => 'decimal:2',
        'three_year'  => 'decimal:2',
        'ytd'         => 'decimal:2',
    ];

    /**
     * Quỹ sở hữu record hiệu suất này.
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }

    /**
     * Dữ liệu benchmark động cho kỳ performance này.
     * Mỗi dòng tương ứng với 1 benchmark (VN-Index, BTC, v.v.)
     */
    public function benchmarkPerformances(): HasMany
    {
        return $this->hasMany(BenchmarkPerformance::class);
    }
}

