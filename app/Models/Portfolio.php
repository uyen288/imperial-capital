<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'fund_id',
        'company_name',
        'ticker',
        'sector',
        'weight',
        'asset_type',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
    ];

    /**
     * Get the fund that owns the portfolio.
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
