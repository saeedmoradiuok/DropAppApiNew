<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $imageLink = config('app.cdn_url') . $this->imageLink;
        $titleVoice = config('app.cdn_url') . $this->titleVoice;
        return [
            'id' => $this->id,
            'categoryId' => $this->categoryId,
            'title' => $this->title,
            'titleVoice' => $titleVoice,
            'pronunciation' => $this->pronunciation,
            'explanation' => $this->explanation,
            'partOfSpeechType' => $this->partOfSpeechType,
            'imageLink' => $imageLink,
            'titleTranslation' => $this->titleTranslation,
            'explanationTranslation' => $this->explanationTranslation,
            'examplesTranslation' => json_decode($this->examplesTranslation, true),
            'examples' => json_decode($this->examples, true)
        ];
    }

    public function getImageLinkAttribute($value)
    {
        return url('storage/' . $value);
    }

    public function getVoiceLinkAttribute($value)
    {
        return url('storage/' . $value);
    }
}
