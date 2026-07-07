<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BenchmarkPerformance extends Model
{
    protected $fillable = [
        'benchmark_id',
        'performance_id',
        'nav',
        'one_month',
        'three_month',
        'one_year',
        'three_year',
        'ytd',
    ];

    protected $casts = [
        'nav'         => 'decimal:4',
        'one_month'   => 'decimal:2',
        'three_month' => 'decimal:2',
        'one_year'    => 'decimal:2',
        'three_year'  => 'decimal:2',
        'ytd'         => 'decimal:2',
    ];

    /**
     * Benchmark mà dòng dữ liệu này thuộc về.
     */
    public function benchmark(): BelongsTo
    {
        return $this->belongsTo(Benchmark::class);
    }

    /**
     * Performance record mà dòng dữ liệu này thuộc về.
     */
    public function performance(): BelongsTo
    {
        return $this->belongsTo(Performance::class);
    }
}
