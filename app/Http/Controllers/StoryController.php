<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Services\StoryService;
use Exception;
use Illuminate\Http\Request;

class StoryController extends Controller
{

    public function addStory(Request $request){
        try{
            return StoryService::addStory($request);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }
    
    public function getStories(Request $request){
        try{
            return StoryService::getStories();
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }

    public function getStory($storyId){
        try{
            return StoryService::getStory($storyId);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }

}
