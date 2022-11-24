<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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


Route::get('/',[CrudController::class,'index'])->name("index.view");
Route::get('/add',[CrudController::class,'add_view'])->name("add_view");
Route::get('/add_user',[CrudController::class,'add_user'])->name("add_user");
Route::get('/store_user',[CrudController::class,'store_user'])->name("store_user");
Route::get('/delete_user',[CrudController::class,'delete_user'])->name("delete_user");
