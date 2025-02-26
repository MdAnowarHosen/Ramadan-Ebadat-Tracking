<?php


if (!function_exists("successResponse"))
{
    function successResponse(string $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }
}


if (!function_exists("successResponseWithData"))
{
    function successResponseWithData(string $message, object $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], 200);
    }
}


if (!function_exists("errorResponse"))
{
    function errorResponse(string $message, int $responseCode = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $responseCode ?? 400);
    }
}
