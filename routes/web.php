<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\recordController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\userController;



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
Route::any('/', [userController::class, 'signin'])->name('login')->middleware('guest');

Route::any('/signup', [userController::class, 'signup'])->middleware('auth');

Route::any('/changepassword', [userController::class, 'changepassword'])->middleware('auth');

Route::any('/dashboard', [homeController::class, 'index'])->middleware('auth');
 
Route::any('/adminsignup', [userController::class, 'signupConfig'])->middleware('auth');

Route::any('/logout', [userController::class, 'logout'])->middleware('auth');

Route::any('/adminsignin', [userController::class, 'signinConfig'])->middleware('guest');;

Route::any('/records', [recordController::class, 'records'])->middleware('auth');

Route::any('/revenue', [recordController::class, 'revenue'])->middleware('auth');

Route::any('/createcategory', [categoryController::class, 'createCategory'])->middleware('auth');

Route::any('/createcatconfig', [categoryController::class, 'createcatConfig'])->middleware('auth');

Route::any('/category', [categoryController::class, 'category'])->middleware('auth');

Route::any('/createitem', [itemController::class, 'createItem'])->middleware('auth');

Route::any('/stocks', [stockController::class, 'stocks'])->middleware('auth');

Route::any('/createitemconfig', [itemController::class, 'createitemconfig'])->middleware('auth');

Route::any('/recordconfig', [recordController::class, 'recordconfig'])->middleware('auth');

Route::delete('/recorddelete/{id}', [recordController::class, 'destroy'])->middleware('auth');

Route::any('/stockupdate', [stockController::class, 'stockupdate'])->middleware('auth');

Route::any('/catedelete/{id}', [categoryController::class, 'cateDelete'])->middleware('auth');

Route::any('/stockdelete/{id}', [stockController::class, 'stockDelete'])->middleware('auth');

Route::any('/restock', [stockController::class, 'restock'])->middleware('auth');

Route::any('/outofstock', [stockController::class, 'outofstock'])->middleware('auth');

Route::any('stockedit/{id}', [stockController::class, 'stockedit'])->middleware('auth');

Route::any('/itemsupdate/{id}', [itemController::class, 'itemsupdate'])->middleware('auth');

Route::any('/catedit/{id}', [categoryController::class, 'catedit'])->middleware('auth');

Route::any('/cateupdate/{id}', [categoryController::class, 'catupdate'])->middleware('auth');

Route::any('/recordedit/{id}', [recordController::class, 'recordedit'])->middleware('auth');

Route::any('/history', [stockController::class, 'history'])->middleware('auth');

