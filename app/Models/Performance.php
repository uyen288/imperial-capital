<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Performance extends Model
{
    protected $fillable = [
        'fund_id',
        'date',
        // Fund data
        'nav',
        'one_month',
        'three_month',
        'one_year',
        'three_year',
        'ytd',
        // VN-Index benchmark
        'vn_index_nav',
        'vn_index_one_month',
        'vn_index_three_month',
        'vn_index_one_year',
        'vn_index_three_year',
        'vn_index_ytd',
        // DCDS benchmark
        'dcds_nav',
        'dcds_one_month',
        'dcds_three_month',
        'dcds_one_year',
        'dcds_three_year',
        'dcds_ytd',
        // VESAF benchmark
        'vesaf_nav',
        'vesaf_one_month',
        'vesaf_three_month',
        'vesaf_one_year',
        'vesaf_three_year',
        'vesaf_ytd',
    ];

    protected $casts = [
        'date' => 'date',
        // Fund
        'nav'         => 'decimal:2',
        'one_month'   => 'decimal:2',
        'three_month' => 'decimal:2',
        'one_year'    => 'decimal:2',
        'three_year'  => 'decimal:2',
        'ytd'         => 'decimal:2',
        // VN-Index
        'vn_index_nav'         => 'decimal:2',
        'vn_index_one_month'   => 'decimal:2',
        'vn_index_three_month' => 'decimal:2',
        'vn_index_one_year'    => 'decimal:2',
        'vn_index_three_year'  => 'decimal:2',
        'vn_index_ytd'         => 'decimal:2',
        // DCDS
        'dcds_nav'         => 'decimal:2',
        'dcds_one_month'   => 'decimal:2',
        'dcds_three_month' => 'decimal:2',
        'dcds_one_year'    => 'decimal:2',
        'dcds_three_year'  => 'decimal:2',
        'dcds_ytd'         => 'decimal:2',
        // VESAF
        'vesaf_nav'         => 'decimal:2',
        'vesaf_one_month'   => 'decimal:2',
        'vesaf_three_month' => 'decimal:2',
        'vesaf_one_year'    => 'decimal:2',
        'vesaf_three_year'  => 'decimal:2',
        'vesaf_ytd'         => 'decimal:2',
    ];

    /**
     * Get the fund that owns the performance.
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
