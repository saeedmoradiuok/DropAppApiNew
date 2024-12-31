<?php

namespace App\Http\Services;

use App\Http\Resources\WordResource;
use App\Http\Responses\ApiResponse;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WordService{

    public static function addWord(Request $request){
        $inputs = $request->only(['categoryId','fileWords']);
        $file = $request->file('fileWords');
        $jsonContent = file_get_contents($file->getPathname());
        $dataArray = json_decode($jsonContent, true);
        foreach($dataArray as $data){
            $sanitizedTitle = Str::slug($data['title']);
            $data['categoryId'] = $inputs['categoryId'];
            $data['imageLink'] = 'images/word-'.$sanitizedTitle.'.jpg';
            $data['titleVoice'] = 'voices/word-'.$sanitizedTitle.'.wav';
            $data['examplesTranslation'] = json_encode($data['examplesTranslation']);
            $data['examples'] = json_encode($data['examples']);
            Word::create($data);
        }
        return ApiResponse::baseResponse(true,'words added',null);
    }

    public static function getWords($categoryId){
        $words = Word::where('categoryId',$categoryId)->get();
        $words = WordResource::collection($words);
        return ApiResponse::wordResponse(true,'get words',$words);    
    }
    
}