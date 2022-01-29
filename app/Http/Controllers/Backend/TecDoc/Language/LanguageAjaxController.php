<?php


namespace App\Http\Controllers\Backend\TecDoc\Language;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\LanguageRepository;

class LanguageAjaxController extends Controller
{
    /**
     * @var LanguageRepository
     */
    protected $languageRepository;

    /**
     * @param LanguageRepository $languageRepository
     */
    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->languageRepository->getData())->make(true);
    }
}
