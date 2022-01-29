<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

abstract class TecDocCommand extends Command
{
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
    protected function getResponseDataAsArray($response)
    {
        return is_array($response['data']) && array_key_exists('array', $response['data']) ? $response['data']['array'] : [];
    }

    //$response->body();
    //$response->json();
    //$response->collect();
    //$response->status();
    //$response->ok();
    //$response->successful();
    //$response->failed();
    //$response->serverError();
    //$response->clientError();
    //$response->header($header);
    //$response->headers();
}
