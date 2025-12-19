<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreCropCategoryRequest;
use App\Http\Requests\UpdateCropCategoryRequest;
use App\Http\Resources\CropCategoryResource;
use App\Models\CropCategory;
use App\Services\CropCategoryService;

class CropCategoryController extends BaseController
{
    protected CropCategoryService $service;

    public function __construct(CropCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->list();

        return $this->success(CropCategoryResource::collection($categories));
    }

    public function store(StoreCropCategoryRequest $request)
    {
        $this->authorize('create', CropCategory::class);

        $category = $this->service->create($request->validated());

        return $this->success(new CropCategoryResource($category), 'Crop category created successfully', 201);
    }

    public function show(CropCategory $cropCategory)
    {
        return $this->success(new CropCategoryResource($cropCategory));
    }

    public function update(UpdateCropCategoryRequest $request, CropCategory $cropCategory)
    {
        $this->authorize('update', $cropCategory);

        $category = $this->service->update($cropCategory->id, $request->validated());

        return $this->success(new CropCategoryResource($category), 'Crop category updated successfully');
    }

    public function destroy(CropCategory $cropCategory)
    {
        $this->authorize('delete', $cropCategory);

        $deletedData = new CropCategoryResource($cropCategory); // capture before deletion
        $this->service->delete($cropCategory->id);

        return $this->success($deletedData, 'Crop category deleted successfully');
    }
}
