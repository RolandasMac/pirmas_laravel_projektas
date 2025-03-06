<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserResourceController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/users', [UserResourceController::class, 'index']);
Route::get('/gaidys', function () {
    return 'Hello World. Čia Gaidys';
});

