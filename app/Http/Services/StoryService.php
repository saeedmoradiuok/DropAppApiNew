<?php

namespace App\Http\Services;

use App\Http\Resources\StoryResource;
use App\Http\Responses\ApiResponse;
use App\Models\Story;
use App\Models\StoryContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class StoryService{


    public static function addStory(Request $request){
        $inputs = $request->only(['title','titleTranslation']);
        $sanitizedTitle = Str::slug($inputs['title']);
        $inputs['coverImage'] = 'images/story-'.$sanitizedTitle.'.jpg';
        $inputs['voiceLink'] = 'voices/story-'.$sanitizedTitle.'.mp3';
        $inputs['subtitleLink'] = 'subtitles/story-'.$sanitizedTitle.'.srt';
        $inputs['storyContent'] = 'stories/story-'.$sanitizedTitle.'.json';
        Story::create($inputs);
        return ApiResponse::baseResponse(true,'story added',null);
    }

    public static function getStories($page){
        $perPage = 10;
        $paginatedStories = Story::where('published', true)
        ->orderBy('id', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);
        $stories = StoryResource::collection($paginatedStories->items());
        $pagination = [
            'total' => $paginatedStories->total(),
            'currentPage' => $paginatedStories->currentPage(),
            'lastPage' => $paginatedStories->lastPage()
        ];
        return ApiResponse::storyResponse(true,'get stories',$pagination,$stories);
    }

    public static function getStory($storyId){
        $story = Story::where('id',$storyId)->first();
        $storyContentUrl = config('app.cdn_url') .$story->storyContent;
        $story = new StoryResource($story);
        $response = Http::get($storyContentUrl);
        $data = $response->json();
        $storyContents = collect($data)->map(function ($item){
            return new StoryContent($item);
        });
        return ApiResponse::storyContentResponse(true,'get story content',$story,$storyContents);
    }

}