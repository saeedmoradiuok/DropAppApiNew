<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'categoryId',
        'title',
        'titleVoice',
        'pronunciation',
        'explanation',
        'partOfSpeechType',
        'imageLink',
        'titleTranslation',
        'explanationTranslation',
        'examplesTranslation',
        'examples',
    ];
}
