<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TEC_DOC_TARGET_TYPE_PASSENGER = 'P';
    const TEC_DOC_TARGET_TYPE_COMMERCIAL = 'O';
    const TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT = 'L';
    const TEC_DOC_TARGET_TYPE_AXLES = 'A';
    const TEC_DOC_TARGET_TYPE_MOTOR = 'M';
    const TEC_DOC_TARGET_TYPE_BODY = 'K';
    const TEC_DOC_TARGET_TYPE_UNIVERSAL = 'U';

    /**
     * @param array $response
     * @return bool
     */
    protected function hasSuccessResponse($response)
    {
        return $this->hasSuccessStatus($response) && $this->hasData($response);
    }

    /**
     * @param array $response
     * @return bool
     */
    protected function hasSuccessStatus($response)
    {
        return is_array($response) && array_key_exists('status', $response) && $response['status'] === 200;
    }

    /**
     * @param array $response
     * @return bool
     */
    protected function hasData($response)
    {
        return is_array($response) && array_key_exists('data', $response);
    }

    /**
     * @param array $response
     * @return array
     */
    protected function getResponseData($response)
    {
        return is_array($response['data']) ? $response['data'] : [];
    }

    /**
     * @param array $response
     * @return array
     */
    protected function getResponseDataAsArray($response)
    {
        return is_array($response['data']) && array_key_exists('array', $response['data']) ? $response['data']['array'] : [];
    }
}
