<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Http\Services\SyncService;
use Exception;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    
    public function syncData(){
        try{
            return SyncService::syncData();
        }catch(Exception $error){
            return ApiResponse::baseResponse(false,$error->getMessage(),null);
        }
    }

}
