<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommentarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('commentar', [CommentarController::class, 'index']);
Route::get('commentar/load', [CommentarController::class, 'loadMore']);
Route::post('commentar/add', [CommentarController::class, 'store']);
