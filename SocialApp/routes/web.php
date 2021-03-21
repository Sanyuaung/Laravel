<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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
Route::middleware('auth')->group(function ()
{
    // User
    Route::get('/',[PageController::class,"index"])->name("home");

    // Post
    Route::get('/user/createpost',[PageController::class,"createpost"])->name("createpost");
    Route::get('/posts/{id}',[PageController::class,"showPostByID"])->name("showPostByID");
    Route::get('/user/userprofile',[PageController::class,"userprofile"])->name("userprofile");
    Route::get('/user/contactus',[PageController::class,"contactus"])->name("contactus");

    Route::get('/posts/edit/{id}',[PageController::class,"editPost"])->name("editPost")->middleware('premiumUser');
    Route::get('/posts/delete/{id}',[PostController::class,"deletePost"])->name("deletePost")->middleware('premiumUser');

    Route::post('/posts/Update/{id}',[PostController::class,"editUpdatePost"])->name("editUpdatePost");
    Route::post('/user/createpost',[PostController::class,"createpost"])->name("post");


    Route::post('/user/contactus',[ContactUsController::class,"post_contact_message"])->name("post_contact_message");
    Route::post('/user/userprofile',[AuthController::class,"post_user_profile"])->name("post_user_profile");


    // auth
    Route::get('/logout',[AuthController::class,"logout"])->name("logout");

    Route::middleware(['admin'])->group(function () {
        // Admin
        Route::get('/admin/contact_messages/delete/{id}',[ContactUsController::class,"deleteMessage"])->name("deleteMessage");
        Route::get('/admin/contact_messages/edit/{id}',[ContactUsController::class,"editMessage"])->name("editMessage");
        Route::post('/admin/contact_messages/update/{id}',[ContactUsController::class,"editUpdateMessage"])->name("editUpdateMessage");
        Route::get('/admin/index',[AdminController::class,"index"])->name("admin.home");
        Route::get('/admin/manage_premium_users',[AdminController::class,"manage_premium_users"])->name("admin.manage_premium_users");
        Route::get('/admin/manage_premium_users/delete/{id}',[AdminController::class,"deleteUser"])->name("deleteUser");
        Route::get('/admin/manage_premium_users/edit/{id}',[AdminController::class,"editUser"])->name("editUser");
        Route::post('/admin/manage_premium_users/update/{id}',[AdminController::class,"editUpdateUser"])->name("editUpdateUser");
        Route::get('/admin/contact_messages',[AdminController::class,"contact_messages"])->name("admin.contact_messages");
    });
});

Route::middleware('guest')->group(function ()
{
    //authentication
    Route::get('/login',[AuthController::class,"login"])->name("login");
    Route::post('/login',[AuthController::class,"post_login"])->name("post_login");
    Route::get('/register',[AuthController::class,"register"])->name("register");
    Route::post('/register',[AuthController::class,"post_register"])->name("post_register");
});
