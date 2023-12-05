<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait HttpTrait
{
    /**
     * Return a new Success JSON response from the application.
     *
     * @param  array  $data
     * @param  string  $message
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(array|Collection|string $data, string $message, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * Return a new Error JSON response from the application.
     *
     * @param  string  $message
     * @param  int  $status
     * @param  array  $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message, int $status = 400, array $errors = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
