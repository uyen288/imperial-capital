<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [
        'fund_id',
        'title',
        'category',
        'file',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    /**
     * Get the fund that owns the document.
     */
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
