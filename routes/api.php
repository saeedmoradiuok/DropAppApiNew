<?php

use App\Http\Controllers\StoryController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SyncController;
use App\Http\Controllers\WordCategoryController;
use App\Http\Controllers\WordController;
use App\Models\StoryContent;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/reset', function () {

    Artisan::call('migrate:reset');
    echo 'migration done';

});

Route::get('/migrate', function () {

    Artisan::call('migrate');

});

Route::group(['middleware' => 'access-verify'], function(){

    Route::post('/wordCategory',[WordCategoryController::class, 'addWordCategory']);
    Route::get('/wordCategory',[WordCategoryController::class, 'getWordCategories']);
    
    Route::post('/words',[WordController::class, 'addWords']);
    Route::get('/words/category/{categoryId}',[WordController::class, 'getWords']);

    Route::get('sync',[SyncController::class,'syncData']);
    Route::post('/support/report',[SupportController::class, 'addReport']);

    Route::post('/story',[StoryController::class,'addStory']);
    Route::get('/story',[StoryController::class,'getStories']);
    Route::get('/story/{storyId}',[StoryController::class,'getStory']);
    
});

