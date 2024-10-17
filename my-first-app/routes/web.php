<?php

require __DIR__ . '/admin.php';

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/login', [AdminLoginController::class, 'index']);
// Route::post("/{param_1}", [])->where("param_1", "string|min:2")->name("product.view ");
// Route::post("/{param_1}", [])->where("param_1", "string|min:2")->name("product.submit");
// Route::post("/{param_1}", [])->where("param_1", "string|min:2")->name("product.edit");
// Route::post("/{param_1}", [])->where("param_1", "string|min:2")->name("product.delete");

Route::prefix("admins")->middleware([])->group(function () {
    require __DIR__ . '/user.php';
});

Route::prefix("/api/users")->group(function () {
    require __DIR__ . '/user.php';
});

Route::prefix("super-users")->middleware([])->group(function () {
    require __DIR__ . '/user.php';
});
