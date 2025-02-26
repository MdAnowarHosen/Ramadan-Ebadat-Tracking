<?php


if (!function_exists("successResponse"))
{
    function successResponse($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }
}


if (!function_exists("successResponseWithData"))
{
    function successResponseWithData($message, $data)
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
    function errorResponse($message, $responseCode = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $responseCode ?? 400);
    }
}
