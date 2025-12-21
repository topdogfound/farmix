<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpraySchedule extends Model
{
    protected $fillable = [
        'cropId',
        'organizationId',
        'year',
        'sourcePdfPath',
        'version',
        'isActive'
    ];

    public function crop(): BelongsTo
    {
        return $this->belongsTo(Crop::class, 'cropId');
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organizationId');
    }

    public function items(): HasMany
    {
        return $this->hasMany(SprayScheduleItem::class, 'sprayScheduleId');
    }
}
