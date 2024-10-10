<?php

use App\Http\Controllers\admincontroller;

use Illuminate\Support\Facades\Route;

Route::get('/',[admincontroller :: class,'loginpage'])->name('loginpage');
Route::get('/view' ,[admincontroller::class ,'view'])->name('view');
Route::get('/dashboard',[admincontroller::class,'dashboard'])->name('dashboard');

Route::post('/register' ,[admincontroller::class ,'register'])->name('register');
Route::post('/login' ,[admincontroller::class ,'login'])->name('login');
Route::get('/logout' , [admincontroller::class,'logout'])->name('logout');

