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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// DATA BLOG 
Route::get('/admin/blog', [App\Http\Controllers\HomeController::class, 'indextwo'])->name('indexblog');

Route::get('/add/blog', [App\Http\Controllers\HomeController::class, 'tambahDataBlog'])->name('adddatablog');

Route::post('/post/blog', [App\Http\Controllers\HomeController::class, 'prosestambahblog'])->name('home.prosestambahblog');

Route::post('/post/blog', [App\Http\Controllers\HomeController::class, 'prosestambahblogs'])->name('home.prosestambahblogs');

Route::get('/blog/hapus/{id}',[App\Http\Controllers\HomeController::class, 'hapusDataBlog'])->name('hapusdatablog');

Route::get('/blog/edit/{id}',[App\Http\Controllers\HomeController::class, 'editDataBlog'])->name('updatedatablog');

Route::post('/blog/proses/edit/{id}',[App\Http\Controllers\HomeController::class, 'updateDataBlog'])->name('updatedatablogs');







// ROUTE SLIDER

Route::get('/admin/slider', [App\Http\Controllers\HomeController::class, 'indexSlider'])->name('indexslider');
Route::get('/add/slider', [App\Http\Controllers\HomeController::class, 'tambahDataSlider'])->name('adddataslider');
Route::post('/add/post/slider', [App\Http\Controllers\HomeController::class, 'prosestambahslider'])->name('postdataslider');
Route::get('/slider/hapus/{id}',[App\Http\Controllers\HomeController::class, 'hapusDataSlider'])->name('hapusdataslider');

Route::get('/slider/edit/{id}',[App\Http\Controllers\HomeController::class, 'editDataSliders'])->name('updatedataslider');
Route::post('/slider/proses/edit/{id}',[App\Http\Controllers\HomeController::class, 'updateDataSlider'])->name('editdataSlider');








