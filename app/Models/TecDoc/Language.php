<?php

namespace App\Models\TecDoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'td_languages';

    /**
     * @var array
     */
    protected $fillable = [
        'languageCode',
        'languageName'
    ];
}
