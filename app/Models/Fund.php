<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'fund_objective',
        'investment_strategy',
        'founded_date',
        'asset_class',
        'fund_type',
        'strategy',
        'suggestion_investion_time',
        'subscription_fee',
        'management_fee',
        'status'
    ];

    
}
