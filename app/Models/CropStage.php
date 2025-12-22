<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CropStage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cropId',
        'stageId'
    ];


    public function crop(): BelongsTo
    {
        return $this->belongsTo(Crop::class, 'cropId');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class, 'stageId');
    }
}
