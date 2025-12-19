<?php

namespace App\Services;

use App\Repositories\Eloquent\CropCategoryRepository;
use App\Services\BaseService;

class CropCategoryService extends BaseService
{
    public function __construct(CropCategoryRepository $repo)
    {
        parent::__construct($repo);
    }

    // Add business-specific logic here
}
