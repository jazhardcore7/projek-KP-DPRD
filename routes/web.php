<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/logins', \App\Http\Controllers\LoginController::class);
Route::resource('/forgots', \App\Http\Controllers\LupaController::class);
Route::resource('/dashboardadm', \App\Http\Controllers\AdminController::class);
Route::resource('/dashboarduser', \App\Http\Controllers\UserController::class);
Route::post('/validasilogin', [\App\Http\Controllers\LoginController::class, 'validasilogin'])->name('validasilogin');
Route::post('/cekmail', [\App\Http\Controllers\LupaController::class, 'cekemail'])->name('cekmail');
Route::get('/ubahpw', [\App\Http\Controllers\LupaController::class, 'ubahpw'])->name('ubahpw');
Route::get('/resetotplupa', [\App\Http\Controllers\LupaController::class, 'resetotplupa'])->name('resetotplupa');
Route::get('/verifylupa', [\App\Http\Controllers\LupaController::class, 'verifylupa'])->name('verifyLupa');
Route::get('/showusers', [\App\Http\Controllers\AdminController::class, 'showusers'])->name('showusers');
Route::get('/profileadm', [\App\Http\Controllers\AdminController::class, 'profileadm'])->name('profileadm');
Route::post('/updatedataadmin/{username}', [\App\Http\Controllers\AdminController::class, 'updatedataadmin'])->name('updatedataadmin');
Route::get('/arsipadm', [\App\Http\Controllers\AdminController::class, 'arsipadm'])->name('arsipadm');
Route::post('/changepw', [\App\Http\Controllers\AdminController::class, 'changepw'])->name('changepw');
Route::post('/updateuser/{email}', [\App\Http\Controllers\AdminController::class, 'updateuser'])->name('updateuser');
Route::post('/updatearsip/{arsip}', [\App\Http\Controllers\AdminController::class, 'updatearsip'])->name('updatearsip');
Route::post('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::get('/editarsip/{arsip}', [\App\Http\Controllers\AdminController::class, 'editarsip'])->name('editarsip');
Route::delete('users/{user}', [\App\Http\Controllers\AdminController::class, 'deleteuser'])->name('deleteuser');
Route::delete('arsips/{arsip}', [\App\Http\Controllers\AdminController::class, 'deletearsip'])->name('deletearsip');
Route::get('/createuser', [\App\Http\Controllers\AdminController::class, 'createuser'])->name('createuser');
Route::get('/createarsip', [\App\Http\Controllers\AdminController::class, 'createarsip'])->name('createarsip');
Route::post('/validasiarsip', [\App\Http\Controllers\AdminController::class, 'validasiarsip'])->name('validasiarsip');
Route::get('/edituser/{email}', [\App\Http\Controllers\AdminController::class, 'edituser'])->name('edituser');
Route::post('/updatedatauser/{username}', [\App\Http\Controllers\UserController::class, 'updatedatauser'])->name('updatedatauser');
Route::get('/setting', [\App\Http\Controllers\AdminController::class, 'setting'])->name('setting');
Route::post('/verifyotplupa', [\App\Http\Controllers\LupaController::class, 'resetpw'])->name('verifyotplupa');
Route::post('/savepw', [\App\Http\Controllers\LupaController::class, 'simpanpw'])->name('savepw');
Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
Route::get('/profileuser', [\App\Http\Controllers\UserController::class, 'profileuser'])->name('profileuser');
Route::get('/bantuanuser', [\App\Http\Controllers\UserController::class, 'bantuanuser'])->name('bantuanuser');
Route::get('/arsipuser', [\App\Http\Controllers\UserController::class, 'arsipuser'])->name('arsipuser');
Route::get('/creators', function () {
    return view('user.creators');
})->name('creators');