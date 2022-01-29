<?php


namespace App\Http\Controllers\Backend\Delivery;


use App\Http\Controllers\Controller;

class NovaPoshtaController extends Controller
{
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
        return is_array($response) && array_key_exists('success', $response) && $response['success'] === true;
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
}
