<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CropCategoryResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     schema="CropCategory",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="name", type="string", example="Vegetables"),
     *     @OA\Property(property="slug", type="string", example="vegetables"),
     *     @OA\Property(property="description", type="string", example="All types of vegetables"),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-19T10:00:00Z"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-19T10:00:00Z")
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'created_at'  => $this->created_at?->toDateTimeString(),
            'updated_at'  => $this->updated_at?->toDateTimeString(),
        ];
    }
}
