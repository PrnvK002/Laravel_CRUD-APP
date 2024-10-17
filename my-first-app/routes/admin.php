<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;


Route::group([
    'prefix' => 'admin',
    'as' => 'admin',
    ], function (){
        Route::view('/login', './admin/login');
});