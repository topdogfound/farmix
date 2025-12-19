<?php

namespace App\Models;

use App\Policies\CropCategoryPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(CropCategoryPolicy::class)]
class CropCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
}
