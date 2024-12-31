<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'titleTranslation',
        'coverImage',
        'voiceLink',
        'subtitleLink',
        'storyContent'
    ];
}
