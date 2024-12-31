<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordCategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $imageLink = config('app.cdn_url') . $this->imageLink;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'translation' => $this->translation,
            'imageLink' => $imageLink, 
            'isPremium' => (bool) $this->isPremium,
        ];
    }

}
