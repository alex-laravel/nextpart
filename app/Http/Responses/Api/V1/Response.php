<?php

namespace App\Http\Responses\Api\V1;

use Illuminate\Http\JsonResponse;

class Response
{
    /**
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public static function success($data = [], $message = '')
    {
        return self::get($data, $message);
    }

    /**
     * @param integer $statusCode
     * @param array $errors
     * @param string $message
     * @return JsonResponse
     */
    public static function error($statusCode = 500, $errors = [], $message = '')
    {
        return self::get([], $message, $errors, $statusCode, false);
    }

    /**
     * @param array $data
     * @param string $message
     * @param array $errors
     * @param integer $statusCode
     * @param boolean $result
     * @return JsonResponse
     */
    private static function get($data = [], $message = '', $errors = [], $statusCode = 200, $result = true)
    {
        return response()->json([
            'statusCode' => $statusCode,
            'result' => $result,
            'message' => self::getResponseMessage($statusCode, $message),
            'errors' => is_array($errors) ? $errors : [$errors],
            'data' => $data,
        ], $statusCode);
    }

    /**
     * @param integer $statusCode
     * @param string $message
     * @return string
     */
    private static function getResponseMessage($statusCode, $message)
    {
        switch ($statusCode) {
            case 200:
                return $message;
            case 404:
                return $statusCode . ' Not Found';
            case 422:
                return $statusCode . ' Unprocessable Entity';
            default:
                return $statusCode . ' ' . $message;
        }
    }
}
