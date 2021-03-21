<?php

use App\Http\Controllers\FashionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get("/",[FashionController::class,'index'])->name("home");
Route::get("/",[FashionController::class,'index'])->name("home");

Route::post("/",[FashionController::class,'insert'])->name("order_now");

Route::middleware(['auth:sanctum', 'verified'])->get("/order",[FashionController::class,'order'])->name("order");

Route::get("/order/edit/{id}",[FashionController::class,'edit'])->name("edit");

Route::get("/order/{id}",[FashionController::class,'delete'])->name("delete");

Route::post("/order/edit/{id}",[FashionController::class,'orderupdate'])->name("update");

Route::get("/Logout",function(){
    Auth::logout();
    return redirect()->route("home");
})->name("logout");











// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
