<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix('/admin')->group(function(){
    //logined users
    Route::middleware('adminAuth')->group(function(){

        Route::get('dashboard/',[DashboardController::class,'index'])->name('admin.dashboard');

        Route::get('logout/',[AdminController::class,'logout'])->name('admin.logout');

        Route::get('profile/',[ProfileController::class,'profile'])->name('admin.profile');

        Route::get('changepasword/',[ProfileController::class,'changepassword'])->name('admin.changepassword');

        Route::patch('/change/password/{admin}',[ProfileController::class,'update'])->name('chpass');

        Route::get('add/user/',[AdminController::class,'list'])->name('user.list');

        Route::patch('/admin/edit/{admin}',[ProfileController::class,'edit'])->name('edit');
        
        Route::get('admin/list',[AdminController::class,'listad'])->name('admin.list');
        Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
        Route::get('/admin/delete/{admin}',[AdminController::class,'delete'])->name('admin.delete');
        
        
        //content controller
        Route::get('/slider/list',[SliderController::class,'index'])->name('list.slider');
        Route::post('/slider/store',[SliderController::class,'store'])->name('store.slider');
        Route::patch('/slider/edit/{slide}',[SliderController::class,'edit'])->name('edit.slider');
        Route::get('/slider/delete',[SliderController::class,'delete'])->name('delete.slider');

        
    });

    
    //not logined users
    Route::middleware('adminGuest')->group(function(){
        Route::get('/login',[AdminController::class,'login'])->name('admin.login');
        Route::post('/check',[AdminController::class,'check'])->name('admin.check');
        
    });
});

Route::get('/', [HomepageController::class, 'index'])->name('home');