<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/tasks', TaskController::class);
