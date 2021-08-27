<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\login;
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


//Login



Route::get('/login',[login::class,'login'])->name('Admin.login');

Route::post('/check',[login::class,'loginprocess'])->name('check');


//Admin Registration

Route::get('registration',[Admin::class,'registration'])->name('Admin.registration');

Route::post('/save',[Admin::class,'formdataprocess'])->name('save');



//Home Page

Route::get('/desbord',[Admin::class,'desbord'])->name('Admin.desbord');

Route::get('/logout',[Admin::class,'logout'])->name('Admin.logout');

Route::get('/chnage',[Admin::class,'chnage'])->name('Admin.chnage');

Route::get('/add_book',[Admin::class,'add_book'])->name('Admin.add_book');

Route::get('/show_book',[Admin::class,'show_book'])->name('Admin.show_book');

Route::post('/check_password',[Admin::class,'check_password'])->name('check_password');

//add book
Route::post('/save1',[Admin::class,'addbook'])->name('save1');

Route::get('Delete/{id}',[Admin::class,'Delete']);

Route::get('edit/{id}',[Admin::class,'edit']);

Route::post('update/{id}',[Admin::class,'update'])->name('Admin.update');




