<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/',[HomeController::class,"home"])->name("home");
Route::post('/upload',[HomeController::class,"upload"])->name("upload");
Route::get('/download',[HomeController::class,"download"])->name("download");


Route::get('/s',[HomeController::class,"s"])->name("s");

