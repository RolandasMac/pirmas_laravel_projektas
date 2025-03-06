<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\DuomenuPerdavimasController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\GetContactsController;
use App\Http\Controllers\GetUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "gaidys"], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'home'])->name('home_alias');
    Route::get('/alias', function () {
        return view('alias');
    })->name('alias');
    Route::get('/bandymai/{nr}/{name}', function ($nr, $name) {
        // return view('home');
        return "Gaidys" . " Numeris: " . $nr . "-" . $name;
    });
    Route::fallback(function () {
        // return view("");
        return "404 not found, nuėjai gaidišku keliu";
    });
});
Route::get("/duomenu_perdavimas", [DuomenuPerdavimasController::class, "index"]);
Route::get('/single_action', SingleActionController::class);
// Route::get('/get_users', [GetUsersController::class, 'index'])->name('get.users');
// Vietoj kelių CRUD routų galima sukurti vieną, pvz.,
Route::resource('/get_users', GetUsersController::class);
Route::resource('/contacts', GetContactsController::class);

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.index');
Route::post('/file-store', [FileUploadController::class, 'store'])->name('file.store');
Route::get('/file-download/{file_path}', [FileUploadController::class, 'download'])->name('file.download');
Route::get('/file-delete/{file_path}', [FileUploadController::class, 'delete'])->name('file.delete');
Route::resource('/crud', CrudController::class);
Route::get('/crud.trash', [CrudController::class, 'trash'])->name('crud.trash');
Route::post('/crud.restore', [CrudController::class, 'restore'])->name('crud.restore');
Route::delete('/crud.delete', [CrudController::class, 'delete'])->name('crud.delete');
