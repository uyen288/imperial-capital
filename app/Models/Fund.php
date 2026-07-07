<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fund extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'short_description',
        'description',
        'strategy',
        'objective',
        'nav',
        'ytd_return',
        'five_year_return',
        'inception_date',
        'latest_report',
        'fund_objective',
        'investment_strategy',
        'founded_date',
        'asset_class',
        'fund_type',
        'suggestion_investion_time',
        'subscription_fee',
        'management_fee',
        'status',
    ];

    protected $casts = [
        'nav' => 'decimal:2',
        'ytd_return' => 'decimal:2',
        'five_year_return' => 'decimal:2',
        'inception_date' => 'date',
        'founded_date' => 'date',
        'status' => 'boolean',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the performances for the fund.
     */
    public function performances(): HasMany
    {
        return $this->hasMany(Performance::class);
    }

    /**
     * Get the portfolios for the fund.
     */
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Get the documents for the fund.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Các chỉ số tham chiếu (benchmark) được cấu hình cho quỹ này.
     * Ví dụ: VN-Index cho quỹ cổ phiếu, BTC cho quỹ crypto.
     */
    public function benchmarks(): HasMany
    {
        return $this->hasMany(Benchmark::class)->orderBy('display_order');
    }
}
