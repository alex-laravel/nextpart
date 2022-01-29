<?php

namespace App\Libraries\Auto;

use Illuminate\Support\Facades\Cookie;


class Garage
{
    const COOKIES_GARAGE_KEY = 'mapGarage';
    const COOKIES_GARAGE_PERIOD = 60 * 60 * 24 * 365;

    /**
     * @return array|null
     */
    public static function getActiveVehicle()
    {
        $vehicles = array_filter(self::extractVehicles(), function ($vehicle) {
            return array_key_exists('selected', $vehicle) && $vehicle['selected'] === true;
        });

        return !empty($vehicles) ? array_values($vehicles)[0] : null;
    }

    /**
     * @return array
     */
    public static function getVehicles()
    {
        $vehicles = self::extractVehicles();

        return is_array($vehicles) ? $vehicles : [];
    }

    /**
     * @return integer
     */
    public static function getVehiclesTotal()
    {
        return count(self::getVehicles());
    }

    /**
     * @param string $manufacturerId
     * @param string $manufacturerName
     * @param string $modelSeriesId
     * @param string $modelSeriesName
     * @param string $vehicleId
     * @param string $vehicleName
     * @return boolean
     */
    public static function addVehicle($manufacturerId, $manufacturerName, $modelSeriesId, $modelSeriesName, $vehicleId, $vehicleName)
    {
        $vehicles = self::getVehicles();

        if (self::hasVehicle($manufacturerId, $modelSeriesId, $vehicleId)) {
            return false;
        }

        $vehicles[self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)] = self::createVehicle($manufacturerId, $manufacturerName, $modelSeriesId, $modelSeriesName, $vehicleId, $vehicleName);

        foreach ($vehicles as &$vehicle) {
            $vehicle['selected'] = false;
        }

        $vehicles[self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)]['selected'] = true;

        self::compactVehicles($vehicles);

        return true;
    }

    /**
     * @param string $manufacturerId
     * @param string $modelSeriesId
     * @param string $vehicleId
     * @return array
     */
    public static function activateVehicle($manufacturerId, $modelSeriesId, $vehicleId)
    {
        $vehicles = self::getVehicles();

        if (!self::hasVehicle($manufacturerId, $modelSeriesId, $vehicleId)) {
            return [];
        }

        foreach ($vehicles as &$vehicle) {
            $vehicle['selected'] = false;
        }

        $vehicles[self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)]['selected'] = true;

        self::compactVehicles($vehicles);

        return $vehicles[self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)];
    }

    /**
     * @param string $manufacturerId
     * @param string $modelSeriesId
     * @param string $vehicleId
     * @return boolean
     */
    public static function deleteVehicle($manufacturerId, $modelSeriesId, $vehicleId)
    {
        $vehicles = self::getVehicles();

        if (!self::hasVehicle($manufacturerId, $modelSeriesId, $vehicleId)) {
            return false;
        }

        unset($vehicles[self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)]);

        self::compactVehicles($vehicles);

        return true;
    }

    /**
     * @return void
     */
    public static function clearVehicles()
    {
        self::compactVehicles([]);
    }

    /**
     * @param string $manufacturerId
     * @param string $modelSeriesId
     * @param string $vehicleId
     * @return boolean
     */
    private static function hasVehicle($manufacturerId, $modelSeriesId, $vehicleId)
    {
        $vehicles = self::getVehicles();

        return array_key_exists(self::generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId), $vehicles);
    }

    /**
     * @return array
     */
    private static function extractVehicles()
    {
        if (!Cookie::has(self::COOKIES_GARAGE_KEY)) {
            return [];
        }

        $vehicles = Cookie::get(self::COOKIES_GARAGE_KEY);
        $vehicles = json_decode($vehicles, true);

        return self::isJson() ? $vehicles : [];
    }

    /**
     * @param array $vehicles
     * @return void
     */
    private static function compactVehicles($vehicles)
    {
        Cookie::queue(self::COOKIES_GARAGE_KEY, json_encode($vehicles), time() + self::COOKIES_GARAGE_PERIOD);
    }

    /**
     * @param string $manufacturerId
     * @param string $manufacturerName
     * @param string $modelSeriesId
     * @param string $modelSeriesName
     * @param string $vehicleId
     * @param string $vehicleName
     * @return array
     */
    private static function createVehicle($manufacturerId, $manufacturerName, $modelSeriesId, $modelSeriesName, $vehicleId, $vehicleName)
    {
        return [
            'manufacturerId' => $manufacturerId,
            'manufacturerName' => $manufacturerName,
            'modelSeriesId' => $modelSeriesId,
            'modelSeriesName' => $modelSeriesName,
            'vehicleId' => $vehicleId,
            'vehicleName' => $vehicleName,
            'selected' => empty(self::getVehicles()),
        ];
    }

    /**
     * @param string $manufacturerId
     * @param string $modelSeriesId
     * @param string $vehicleId
     * @return string
     */
    private static function generateVehicleHash($manufacturerId, $modelSeriesId, $vehicleId)
    {
        return md5($manufacturerId . '|' . $modelSeriesId . '|' . $vehicleId);
    }

    /**
     * @return boolean
     */
    private static function isJson()
    {
        return json_last_error() === JSON_ERROR_NONE;
    }
}
