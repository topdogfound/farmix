<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SprayControl extends Model
{
    protected $fillable = ['sprayScheduleItemId', 'cropThreatId', 'chemicalId', 'quantity', 'unit'];

    public function sprayScheduleItem(): BelongsTo
    {
        return $this->belongsTo(SprayScheduleItem::class, 'sprayScheduleItemId');
    }

    public function cropThreat(): BelongsTo
    {
        return $this->belongsTo(CropThreat::class, 'cropThreatId');
    }

    public function chemical(): BelongsTo
    {
        return $this->belongsTo(Chemical::class, 'chemicalId');
    }
}
