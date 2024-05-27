<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('makeJsonResponse')) {
    function makeJsonResponse($message, $data = [], $status = 200, $errors = []): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data ?? [],
            'errors'  => $errors
        ], $status, [], 1);
    }
}
