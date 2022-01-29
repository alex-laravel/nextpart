<?php

if (!function_exists('routeHome')) {

    /**
     * @return string
     */
    function routeHome()
    {
        return '/';
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * @param string $folder
     */
    function includeRouteFiles($folder)
    {
        try {
            $recursiveDirectoryIterator = new RecursiveDirectoryIterator($folder);
            $recursiveIteratorIterator = new RecursiveIteratorIterator($recursiveDirectoryIterator);

            while ($recursiveIteratorIterator->valid()) {
                if (!$recursiveIteratorIterator->isDot()
                    && $recursiveIteratorIterator->isFile()
                    && $recursiveIteratorIterator->isReadable()
                ) {
                    require $recursiveIteratorIterator->key();
                }

                $recursiveIteratorIterator->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('productPriceRounded')) {

    /**
     * @param float $price
     * @return string
     */
    function productPriceRounded($price)
    {
        $price = $price > 0 ? $price : 0;

        return round($price, 2);
    }
}

if (!function_exists('productPriceFormatted')) {

    /**
     * @param float $price
     * @return string
     */
    function productPriceFormatted($price)
    {
        $price = $price > 0 ? $price : 0;

        return number_format(productPriceRounded($price), 2, '.', ' ');
    }
}

