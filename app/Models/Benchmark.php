<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Benchmark extends Model
{
    protected $fillable = [
        'fund_id',
        'name',
        'slug',
        'display_order',
    ];

    protected $casts = [
        'display_order' => 'integer',
    ];

    /**
     * Quỹ sở hữu benchmark này.
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }

    /**
     * Các dòng dữ liệu hiệu suất của benchmark này.
     */
    public function benchmarkPerformances(): HasMany
    {
        return $this->hasMany(BenchmarkPerformance::class);
    }
}
