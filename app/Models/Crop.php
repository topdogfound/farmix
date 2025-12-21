<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Crop extends Model
{
    protected $fillable = [
        'cropCategoryId',
        'name',
        'slug',
        'description'
    ];

    public function category() :BelongsTo
    {
        return $this->belongsTo(CropCategory::class, 'cropCategoryId');
    }

    public function stages() :BelongsToMany
    {
        return $this->belongsToMany(Stage::class, 'crop_stages', 'cropId', 'stageId');
    }   
}
