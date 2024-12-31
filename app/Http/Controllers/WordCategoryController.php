<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Services\WordCategoryService;
use Exception;
use Illuminate\Http\Request;

class WordCategoryController extends Controller
{
    

    public function addWordCategory(Request $request){
        try{
              return WordCategoryService::addWordCategory($request);  
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);    
        }
    }

    public function getWordCategories(Request $request){
        try{
                return WordCategoryService::getWordCategories($request);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);    
        }
    }

}
