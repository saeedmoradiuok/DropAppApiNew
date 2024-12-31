<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryContent extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'contentId',
        'englishText',
        'translationText'
    ];
}
