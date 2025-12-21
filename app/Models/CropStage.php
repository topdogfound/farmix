<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropStage extends Model
{
    protected $fillable = [
        'cropId',
        'stageId'
    ];
}
