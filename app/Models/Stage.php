<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stage extends Model
{

    protected $fillable = [
        'name',
        'sequence',
        'description'
    ];

    public function crops(): BelongsToMany
    {
        return $this->belongsToMany(Stage::class, 'crop_stages', 'cropId', 'stageId')
            ->orderBy('sequence');
    }
}
