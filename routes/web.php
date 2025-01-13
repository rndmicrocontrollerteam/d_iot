<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ControlAdminController;
use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RedirectHandlesController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\IotController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserAuthController;

Route::get('/', [IndexController::class, 'index']);
Route::post('/', [IndexController::class, 'index']);
Route::get('loginadmin', [AdminAuthController::class, 'index']); //login admin
Route::get('/article/{slug}', [IndexController::class, 'show'])->name('show');
Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
Route::get('login', [UserAuthController::class, 'index'])->name('userlogin'); //loginuser
Route::post('login', [UserAuthController::class, 'auth'])->name('userloginpost');//loginuser
Route::get('register', [UserAuthController::class, 'registerindex'])->name('registerindex');
Route::post('register', [UserAuthController::class, 'register'])->name('registerpost');
Route::post('loginadmin', [AdminAuthController::class, 'auth'])->name('authpost'); //login admin
Route::get('/logout', [AdminAuthController::class, 'signOut'])->name('signout');
Route::delete('/article/{id}/delete', [ArticleController::class, 'destroy'])->name('articledestroy');
Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
Route::put('article/{id}/update', [ArticleController::class, 'update'])->name('update');
Route::get('/dashboard/article/{id}/edit', [ArticleController::class, 'edit'])->name('editarticle');

Route::group(['prefix' => "dashboard"], function () {
    Route::get('/tambahartikel', [ArticleController::class, 'index'])->name('addarticle');
    Route::post('/tambahartikel', [ArticleController::class, 'create'])->name('addarticlepost');
    Route::delete('/article/{id}/delete', [ArticleController::class, 'destroy'])->name('articledestroy');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('editarticle');
    Route::put('/article/{id}/update', [ArticleController::class, 'update'])->name('update');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
    Route::get('/statistik', [AdminAuthController::class, 'statistic'])->name('statisticindex');
    Route::get('/admin', [AdminAuthController::class, 'setting'])->name('adminsetting');
    Route::post('/admin', [AdminAuthController::class, 'createnewadmin'])->name('createadmin');
    Route::get('/admin/{user:slug}/details', [AdminAuthController::class, 'admindetails'])->name('admindetails');
    Route::post('/admin/{user:slug}/details', [AdminAuthController::class, 'adminUpdatePicture'])->name('adminupdatepic');
    Route::get('/imageuploader', [AdminAuthController::class, 'imageuploaderview'])->name('imageuploader');
    Route::post('/imageuploader', [AdminAuthController::class, 'imageuploader'])->name('imageuploaderpost');
    Route::delete('/image/{id}/delete', [AdminAuthController::class, 'imagedestroy'])->name('imagedestroy');
    Route::get('/addcategory', [AdminAuthController::class, 'addcategoryindex'])->name('addcategory');
    Route::post('/addcategory', [AdminAuthController::class, 'addcategory'])->name('addcategorypost');
    Route::get('/category/{slug}/details', [AdminAuthController::class, 'categorydetails'])->name('categorydetails');
    Route::delete('/category/{id}/delete', [AdminAuthController::class, 'categorydestroy'])->name('categorydestroy');
    Route::get('/usersetting', [AdminAuthController::class, 'usersettingindex'])->name('usersetting');
    Route::get('/usersetting/{user:slug}/details', [AdminAuthController::class, 'userdetails'])->name('userdetails');
    Route::post('/usersetting/{user:slug}/details', [AdminAuthController::class, 'userupdatepic'])->name('userupdate');
    Route::get('/iot', [IotController::class, 'index'])->name('iotindex');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/controladmin', [ControlAdminController::class, 'index'])->name('controladmin.index');
    Route::get('/controladmin/add', [ControlAdminController::class, 'create'])->name('controladmin.create');
    Route::post('/controladmin/store', [ControlAdminController::class, 'store'])->name('controladmin.store');
    Route::get('/controladmin/{id}/edit', [ControlAdminController::class, 'edit'])->name('controladmin.edit');
    Route::put('/controladmin/{id}', [ControlAdminController::class, 'update'])->name('controladmin.update');
    Route::delete('/controladmin/{id}', [ControlAdminController::class, 'destroy'])->name('controladmin.destroy');
});
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::get('/categoryarticle', [CustomController::class, 'categoryArticleIndex'])->name('categoryarticle');
Route::post('/addarticletype', [CustomController::class, 'addArticleType'])->name('addarticletype');

Route::get('/userrole', [AdminAuthController::class, 'userRoleIndex'])->name('userrole');
Route::post('/adduserrole', [AdminAuthController::class, 'addUserRole'])->name('adduserrole');

Route::get('category/{slug}', [ArticleController::class, 'category'])->name('categoryindex');
Route::get('allcategory', [ArticleController::class, 'categoryall'])->name('categoryall');
Route::get('404', [RedirectHandlesController::class, 'index']);

