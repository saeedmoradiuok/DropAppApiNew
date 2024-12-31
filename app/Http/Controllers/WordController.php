<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Services\WordService;
use Exception;
use Illuminate\Http\Request;

class WordController extends Controller
{
    

    public function addWords(Request $request){
        try{
            return WordService::addWord($request);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }

    public function getWords($categoryId){
        try{
            return WordService::getWords($categoryId);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }
}
