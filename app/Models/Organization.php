<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organization extends Model
{
    protected $fillable = [
        'organizationTypeId',
        'name',
        'location',
        'email',
        'mobile',
        'website'
    ];
    public function type():BelongsTo
    {
        return $this->belongsTo(OrganizationType::class, 'organizationTypeId');
    }
}
