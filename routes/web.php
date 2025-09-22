<?php

use App\Livewire\About;
use App\Livewire\Contacts;
use App\Livewire\Home;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;


// Route::get('/users', Users::class);

Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/users', Users::class);
Route::get('/contacts', Contacts::class);
