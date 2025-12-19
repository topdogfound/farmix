<?php

namespace App\Repositories\Eloquent;

use App\Models\CropCategory as Category;
use App\Repositories\BaseRepository;

class CropCategoryRepository extends BaseRepository 
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug)
    {
        return $this->firstWhere(['slug' => $slug]);
    }
}
