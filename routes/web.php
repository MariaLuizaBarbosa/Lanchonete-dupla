<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use App\Livewire\Create\Create;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class);

Route::get('/admin', function(){
    return 'login admin';
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/cliente', function(){
    return 'login cliente';
})->middleware(['auth', 'role:cliente'])->name('cliente.dashboard');

Route::get('/user', function(){
    return 'login user';
})->middleware(['auth', 'role:user'])->name('user.dashboard');

Route::get('/cliente/create', Create::class);
Route::get('/editar/{id}', Edit::class)->name('cliente.edit');
Route::get('/cliente/index', Index::class);