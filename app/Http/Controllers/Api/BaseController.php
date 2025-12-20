<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


/**
 * @OA\Info(
 *     title="Farmix API",
 *     version="1.0.0",
 *     description="Enterprise-grade Crop & Farming APIs"
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Primary API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="apiKey",
 *     in="header",
 *     name="Authorization"
 * )
 *
 * @OA\Schema(
 *     schema="SuccessResponse",
 *     type="object",
 *     @OA\Property(property="status", type="string", example="success"),
 *     @OA\Property(property="message", type="string", example="Operation successful"),
 *     @OA\Property(property="data", type="object", nullable=true)
 * )
 *
 * @OA\Schema(
 *     schema="ErrorResponse",
 *     type="object",
 *     @OA\Property(property="status", type="string", example="error"),
 *     @OA\Property(property="message", type="string", example="Validation failed"),
 *     @OA\Property(property="errors", type="object", example={"name": {"The name field is required."}})
 * )
 */
class BaseController extends Controller
{
    use AuthorizesRequests;

    /**
     * Success JSON response
     *
     * @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/SuccessResponse")
     * )
     *
     * @OA\Response(
     *     response=201,
     *     description="Resource created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/SuccessResponse")
     * )
     */
    protected function success($data, $message = 'Success', $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Error JSON response
     *
     * @OA\Response(
     *     response=400,
     *     description="Bad Request",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     *
     * @OA\Response(
     *     response=401,
     *     description="Unauthorized",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     *
     * @OA\Response(
     *     response=403,
     *     description="Forbidden",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     *
     * @OA\Response(
     *     response=404,
     *     description="Resource Not Found",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     *
     * @OA\Response(
     *     response=422,
     *     description="Validation Error",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     *
     * @OA\Response(
     *     response=500,
     *     description="Internal Server Error",
     *     @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     * )
     */
    protected function error($message = 'Error', $code = 400, $errors = []): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
