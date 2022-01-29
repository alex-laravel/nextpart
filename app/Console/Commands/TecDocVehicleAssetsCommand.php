<?php


namespace App\Console\Commands;


use App\Models\TecDoc\VehicleDetails\VehicleDetails;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TecDocVehicleAssetsCommand extends TecDocCommand
{
    const VEHICLE_ASSETS_STORAGE_NAME = 'vehicles';

    /**
     * @var string
     */
    protected $signature = 'tecdoc:vehicle-assets {vehicleId} {vehicleDocId}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Vehicle assets';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return boolean
     */
    public function handle()
    {
        \Log::debug('CALL COMMAND [tecdoc:vehicle-assets]');

        $vehicleId = (int)$this->argument('vehicleId');
        $vehicleDocId = $this->argument('vehicleDocId');

        $vehicle = VehicleDetails::where('carId', $vehicleId)->first();

        $responseImage = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->get(config('tecdoc.asset.url') . '/' . config('tecdoc.api.provider') . '/' . $vehicleDocId . '/0');
        $responseThumbnail = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->get(config('tecdoc.asset.url') . '/' . config('tecdoc.api.provider') . '/' . $vehicleDocId . '/1');

        if ($responseImage->ok()) {
            $vehicleAssetName = $this->generateVehicleAssetNme($responseImage->header('Content-Type'), $vehicle->id . $vehicle->carId);
            $vehicle->assetImageName = $vehicleAssetName;

            Storage::disk(self::VEHICLE_ASSETS_STORAGE_NAME)->put($vehicleAssetName, $responseImage->body());
        }

        if ($responseThumbnail->ok()) {
            $vehicleAssetName = $this->generateVehicleAssetNme($responseThumbnail->header('Content-Type'), $vehicle->carId);
            $vehicle->assetThumbnailName = $vehicleAssetName;

            Storage::disk(self::VEHICLE_ASSETS_STORAGE_NAME)->put($vehicleAssetName, $responseThumbnail->body());
        }

        if ($responseImage->ok() || $responseThumbnail->ok()) {
            $vehicle->save();

            \Log::info('ASSET CREATED for Vehicle ID [' . $vehicle->carId . ']!');

            $this->line(true);
            return true;
        }

        $this->line(false);
        return false;
    }

    /**
     * @param string $mimeType
     * @return string
     */
    private function getExtension($mimeType)
    {
        $extensions = [
            'image/gif' => 'gif',
            'image/jpeg' => 'jpg',
            'image/png' => 'png'
        ];

        return array_key_exists($mimeType, $extensions) ? $extensions[$mimeType] : 'tmp';

    }

    /**
     * @param string $header
     * @param string $name
     * @return string
     */
    private function generateVehicleAssetNme($header, $name)
    {
        return md5($name) . '.' . $this->getExtension($header);

    }
}
