<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        $coverImage = config('app.cdn_url') . $this->coverImage;
        $voiceLink = config('app.cdn_url') . $this->voiceLink;
        $subtitleLink = config('app.cdn_url') . $this->subtitleLink;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'titleTranslation' => $this->titleTranslation,
            'coverImage' => $coverImage,
            'voiceLink' => $voiceLink,
            'subtitleLink' => $subtitleLink
        ];
    }
}
