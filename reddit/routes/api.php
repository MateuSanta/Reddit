<?php

use App\Models\User;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommunityController;
use App\Http\Controllers\Api\CommentaryController;

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth')->group(function () {

Route::apiResource("communities",CommunityController::class);
Route::apiResource("posts",PostController::class);
Route::apiResource("commentaries",CommentaryController::class);
});



