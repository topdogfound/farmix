<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CropThreat extends Model
{
    protected $fillable = ['cropThreatTypeId', 'name', 'description'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CropThreatType::class, 'cropThreatTypeId');
    }
}