<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DuomenuPerdavimasController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\GetContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserResourceController;
use App\Http\Middleware\CheckUserRoleMiddleware;
// use Illuminate\Support\Facades\Request;
use App\Mail\SendMail;
use App\Services\TestClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

Route::get('/custom', function () {
    return "Senas maršrutas veikia!";
})->name('custom.route');

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home'])->name('home_alias');
Route::group(["prefix" => "gaidys", "middleware" => CheckUserRoleMiddleware::class], function () {

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
Route::resource('/get_users', UserResourceController::class);
Route::get('user', [UserResourceController::class, 'getOrders'])->name('user.orders');
Route::get('userroles', [UserResourceController::class, 'roles'])->name('user.roles');
Route::get('userproducts', [ProductsController::class, 'index'])->name('user.products');
Route::post('userproduct/{id}', [ProductsController::class, 'showone'])->name('user.product.show');
Route::resource('/contacts', GetContactsController::class);

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.index');
Route::post('/file-store', [FileUploadController::class, 'store'])->name('file.store');
Route::get('/file-download/{file_path}', [FileUploadController::class, 'download'])->name('file.download');
Route::get('/file-delete/{file_path}', [FileUploadController::class, 'delete'])->name('file.delete');
Route::resource('/crud', CrudController::class);
Route::get('/crud.trash', [CrudController::class, 'trash'])->name('crud.trash');
Route::post('/crud.restore', [CrudController::class, 'restore'])->name('crud.restore');
Route::delete('/crud.delete', [CrudController::class, 'delete'])->name('crud.delete')->middleware(CheckUserRoleMiddleware::class);
Route::get('/cities', [CitiesController::class, 'index'])->name('get.cities')->middleware("gaidys:2");
// ->middleware('TestGroup');
Route::get("/mail", function () {
    // dd("mail");
    return view('email');
})->name("email");
Route::post('/mail', function (Request $request) {
    // dd(request()->input('email'));
    // Mail::raw(request()->input('message'), function ($message) use ($request) {
    //     $message->to(request()->input('email'))
    //         ->subject('Pirmas projektas');
    // });

    // return "El. paštas išsiųstas į: " . request()->input('email');

//Jeigu kitas Request
    // Mail::raw($request->input('message'), function ($message) use ($request) {
    //     $message->to($request->email)->subject('Pirmas projektas');
    // });
    // return "El. paštas išsiųstas į: " . $request->email;

    //Su nauju sendMail objektu
    // Mail::to($request->email)->send(new SendMail($request->message));

    //Su queue navarotu
    Mail::to($request->email)->queue(new SendMail($request->message));
    return "El. paštas išsiųstas į: " . $request->email;
})->name('send.email');
Route::get('session', function (Request $request) {
    // request()->session()->put('key', 'sessionValue');
    // session(['sesijosKintamasis' => 'kintamojo reiksme']);
    // Session::put('user_name', 'Jonas');
    // dump(Session::all());

    // $value = $request->session()->get('key');
    // $value = session('user_name');
    // $value = Session::get('sesijosKintamasis');

    Session::forget('user_name');

    // Session::flush();

    dump(Session::all());
    // dd('Session value: ' . $value);
    return view('session');
})->name('session');

Route::get('testClass', function () {
    // dd("testas veikia");
    // dd(app()->make(TestClass::class)->testMethod());//Neužregistruota class
    // dd(TestClass::testMethod());

    // $instance = app('Test');//per boot registruotas alias
    // dd($instance->testMethod());

    dd(TestClass::testMethod());

});
