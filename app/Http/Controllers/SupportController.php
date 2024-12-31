<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Services\SupportService;
use Exception;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    
    public function addReport(Request $request){
        try{
            return SupportService::addReport($request);
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }

}
