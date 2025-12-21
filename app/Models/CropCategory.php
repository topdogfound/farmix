<?php

namespace App\Models;

use App\Policies\CropCategoryPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UsePolicy(CropCategoryPolicy::class)]
class CropCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function crops() :HasMany
    {
        return $this->hasMany(Crop::class, 'cropCategoryId');
    }
}
