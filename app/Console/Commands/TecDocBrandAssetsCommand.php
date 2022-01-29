<?php


namespace App\Console\Commands;


use App\Models\TecDoc\Brand\Brand;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TecDocBrandAssetsCommand extends TecDocCommand
{
    const BRAND_ASSETS_STORAGE_NAME = 'brands';

    /**
     * @var string
     */
    protected $signature = 'tecdoc:brand-assets {brandId} {brandLogoId}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Brand Logos';

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
        \Log::debug('CALL COMMAND [tecdoc:brand-assets]');

        $brandId = (int)$this->argument('brandId');
        $brandLogoId = (int)$this->argument('brandLogoId');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->get(config('tecdoc.asset.url') . '/' . config('tecdoc.api.provider') . '/' . $brandLogoId . '/1');

        if ($response->ok()) {
            $brand = Brand::find($brandId);

            $brandLogoName = md5($brand->brandLogoID) . '.' . $this->getExtension($response->header('Content-Type'));

            $storage = Storage::disk(self::BRAND_ASSETS_STORAGE_NAME);
            $storage->put($brandLogoName, $response->body());

            $brand->brandLogoName = $brandLogoName;
            $brand->save();

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
}
