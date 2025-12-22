<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{

    protected $fillable = [
        'cropId',
        'name',
        'sequence',
        'description'
    ];

    public function crops(): BelongsToMany
    {
        return $this->belongsToMany(Stage::class, 'crop_stages', 'cropId', 'stageId')
            ->orderBy('sequence');
    }
    // ONE stage has MANY crop_stage rows
    public function cropStages(): HasMany
    {
        return $this->hasMany(CropStage::class, 'stageId');
    }
}
