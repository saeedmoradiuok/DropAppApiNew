<?php

namespace App\Http\Services;

use App\Http\Responses\ApiResponse;
use App\Models\Report;
use Illuminate\Http\Request;

class SupportService{


    public static function addReport(Request $request){
        $inputs = $request->only('wordId','message');
        Report::create($inputs);
        return ApiResponse::baseResponse(true,'word reported',null);
    }
}