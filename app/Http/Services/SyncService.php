<?php

namespace App\Http\Services;

use App\Http\Responses\ApiResponse;

class SyncService{

    public static function syncData(){
        return ApiResponse::syncResponse(true,'data synced','4.0');
    }

}