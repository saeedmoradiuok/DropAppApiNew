<?php

namespace App\Http\Responses;

class ApiResponse{

    public static function baseResponse($success, $message, $data,$statusCode = 400){
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $success ? 200 : $statusCode);
    }

    public static function wordCategoryResponse($success,$message,$wordCategories){
        return self::baseResponse($success, $message, [
            'wordCategories' => $wordCategories
        ], $success ? 200 : 400);
    }

    public static function wordResponse($success,$message,$words){
        return self::baseResponse($success, $message, [
            'words' => $words
        ], $success ? 200 : 400);
    }

    public static function syncResponse($success,$message,$appVersion){
        return self::baseResponse($success, $message, [
            'appVersion' => $appVersion
        ], $success ? 200 : 400);
    }

    public static function storyResponse($success,$message,$pagination,$stories){
        return self::baseResponse($success, $message, [
            'pagination' => $pagination,
            'stories' => $stories
        ], $success ? 200 : 400);
    }

    public static function storyContentResponse($success,$message,$story,$storyContents){
        return self::baseResponse($success, $message, [
            'story' => $story,
            'storyContents' => $storyContents
        ], $success ? 200 : 400);
    }

}