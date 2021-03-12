<?php

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

use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostsAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/admin', [PostsAdminController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/create', [PostsAdminController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/store', [PostsAdminController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/edit/{id}', [PostsAdminController::class, 'edit'])->name('admin.posts.edit');
Route::put('/admin/update/{id}', [PostsAdminController::class, 'update'])->name('admin.posts.update');
Route::get('/admin/destroy/{id}', [PostsAdminController::class, 'destroy'])->name('admin.posts.destroy');