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

    /**
     * List all crop categories
     * 
     * @OA\Get(
     *     path="/api/crop-categories",
     *     tags={"Crop Categories"},
     *     summary="Get all crop categories",
     *     @OA\Response(response=200, description="List retrieved successfully", @OA\JsonContent(ref="#/components/schemas/SuccessResponse")),
     * )
     */
    public function index()
    {
        $categories = $this->service->list();

        return $this->success(CropCategoryResource::collection($categories));
    }

    /**
     * Store a new crop category
     *
     * @OA\Post(
     *     path="/api/crop-categories",
     *     tags={"Crop Categories"},
     *     summary="Create a new crop category",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Fruits"),
     *             @OA\Property(property="slug", type="string", example="fruits"),
     *             @OA\Property(property="description", type="string", example="All types of fruits")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Created", @OA\JsonContent(ref="#/components/schemas/SuccessResponse")),
     *     @OA\Response(response=422, description="Validation Error", @OA\JsonContent(ref="#/components/schemas/ErrorResponse"))
     * )
     */
    public function store(StoreCropCategoryRequest $request)
    {
        $this->authorize('create', CropCategory::class);

        $category = $this->service->create($request->validated());

        return $this->success(new CropCategoryResource($category), 'Crop category created successfully', 201);
    }



    /**
     * Show a single crop category
     * 
     * @OA\Get(
     *     path="/api/crop-categories/{id}",
     *     tags={"Crop Categories"},
     *     summary="Get a crop category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent(ref="#/components/schemas/SuccessResponse")),
     *     @OA\Response(response=404, description="Not Found", @OA\JsonContent(ref="#/components/schemas/ErrorResponse"))
     * )
     */
    public function show(CropCategory $cropCategory)
    {
        return $this->success(new CropCategoryResource($cropCategory));
    }


    /**
     * Update a crop category
     * 
     * @OA\Put(
     *     path="/api/crop-categories/{id}",
     *     tags={"Crop Categories"},
     *     summary="Update a crop category",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Vegetables"),
     *             @OA\Property(property="slug", type="string", example="vegetables"),
     *             @OA\Property(property="description", type="string", example="All types of vegetables")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Updated", @OA\JsonContent(ref="#/components/schemas/SuccessResponse")),
     *     @OA\Response(response=422, description="Validation Error", @OA\JsonContent(ref="#/components/schemas/ErrorResponse")),
     *     @OA\Response(response=403, description="Forbidden", @OA\JsonContent(ref="#/components/schemas/ErrorResponse"))
     * )
     */

    public function update(UpdateCropCategoryRequest $request, CropCategory $cropCategory)
    {
        $this->authorize('update', $cropCategory);

        $category = $this->service->update($cropCategory->id, $request->validated());

        return $this->success(new CropCategoryResource($category), 'Crop category updated successfully');
    }


    /**
     * Delete a crop category
     * 
     * @OA\Delete(
     *     path="/api/crop-categories/{id}",
     *     tags={"Crop Categories"},
     *     summary="Delete a crop category",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Deleted successfully", @OA\JsonContent(ref="#/components/schemas/SuccessResponse")),
     *     @OA\Response(response=403, description="Forbidden", @OA\JsonContent(ref="#/components/schemas/ErrorResponse")),
     *     @OA\Response(response=404, description="Not Found", @OA\JsonContent(ref="#/components/schemas/ErrorResponse"))
     * )
     */
    public function destroy(CropCategory $cropCategory)
    {
        $this->authorize('delete', $cropCategory);

        $deletedData = new CropCategoryResource($cropCategory); // capture before deletion
        $this->service->delete($cropCategory->id);

        return $this->success($deletedData, 'Crop category deleted successfully');
    }
}
