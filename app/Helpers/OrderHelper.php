<?php


namespace App\Helpers;


class OrderHelper
{
    const ORDER_NUMBER_OFFSET = 1000000;

    /**
     * @param integer $lastInsertedId
     * @return string
     */
    public static function generateOrderNumber($lastInsertedId)
    {
        return '#' . str_pad(++$lastInsertedId + self::ORDER_NUMBER_OFFSET, 7, '0', STR_PAD_LEFT);
    }
}
