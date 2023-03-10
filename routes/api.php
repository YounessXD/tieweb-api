<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
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
Route::post('register', [AuthController::class,'register']);

Route::post('uploaded',[ImageController::class,'uploaded']);





Route::post('login', [AuthController::class,'login']);

Route::group(['middlewar'=>'api'],function(){

    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});




Route::resource('post',PostController::class);
Route::resource('posts',PostController::class);
Route::resource('user',PostController::class);


// Route::get('/posts',function(){
//     $post = User::get();
//     return response()->json($post); 
// });

