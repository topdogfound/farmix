<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SprayScheduleItem extends Model
{
    protected $fillable = [
        'sprayScheduleId',
        'cropStageId',
        'remarks'
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(SpraySchedule::class, 'sprayScheduleId');
    }

    public function cropStage(): BelongsTo
    {
        return $this->belongsTo(CropStage::class, 'cropStageId');
    }

    public function controls(): HasMany
    {
        return $this->hasMany(SprayControl::class, 'sprayScheduleItemId');
    }

    public function getDisplayLabelAttribute(): string
    {
        return sprintf(
            '(%s - %s - %s) - %s',
            $this->schedule->crop->name,
            $this->schedule->organization->name,
            $this->schedule->year,
            $this->cropStage->stage->name,
        );
    }
}
