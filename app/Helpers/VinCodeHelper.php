<?php


namespace App\Helpers;


class VinCodeHelper
{
    const PATTERN = '/^(?<wmi>[0-9A-HJ-NPR-Z]{3})(?<vds>[0-9A-HJ-NPR-Z]{6})(?<vis>[0-9A-HJ-NPR-Z]{8})$/';
}
