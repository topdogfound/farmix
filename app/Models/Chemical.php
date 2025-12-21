<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chemical extends Model
{
    protected $fillable = [
        'chemicalTypeId', 
        'title', 
        'brandNames', 
        'description', 
        'toxicityLevel', 
        'waitingPeriodDays', 
        'organic', 
        'banned'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ChemicalType::class, 'chemicalTypeId');
    }
}