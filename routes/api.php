<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\RelationshipController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Auth\Access\Response;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
      
    /////////////////// Lesson //////////////
    Route::apiResource('lessons', LessonController::class);
    ///////////////// Users ////////////////
    Route::apiResource('users', UserController::class)->middleware('auth:api');
     ///////////////// tags ////////////////
     Route::apiResource('tags', TagController::class);
    ////////////////////////////Relationship/////////////////////////////////
    Route::get('user/{id}/lessons' , [RelationshipController::class , 'lessonUser'] );
    Route::get('lesson/{id}/tags' , [RelationshipController::class , 'lessonTag'] );
    Route::get('tag/{id}/lessons' , [RelationshipController::class , 'tagLesson'] );
    /////////////////// PassPort //////////////////////////////////////
    Route::get('/login', [LoginController::class,'login'])->name('login');
    //-------------------------------------------------------------------///
    Route::any('lesson', function(){
        return "Please Make sure to update your url";
    });
    Route::redirect('lesson', 'lessons');
});
