<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChemicalType extends Model
{
    protected $fillable = ['name'];

    public function chemicals(): HasMany
    {
        return $this->hasMany(Chemical::class, 'chemicalTypeId');
    }
}