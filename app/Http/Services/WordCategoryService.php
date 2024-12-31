<?php

namespace App\Http\Services;

use App\Http\Resources\WordCategoryResource;
use App\Http\Responses\ApiResponse;
use App\Models\WordCategory;
use Illuminate\Http\Request;

class WordCategoryService{


    public static function addWordCategory(Request $request){
        $inputs = $request->only(['title','translation']);
        $inputs['imageLink'] = 'images/category-'.$inputs['title'].'.jpg';
        WordCategory::create($inputs);
        return ApiResponse::baseResponse(true,'word category added',null);
    }

    public static function getWordCategories(Request $request){
        $wordCategories = WordCategory::where('isActive',true)->get();
        $wordCategories = WordCategoryResource::collection($wordCategories);
        return ApiResponse::wordCategoryResponse(true,'get word categories',$wordCategories);
    }
}