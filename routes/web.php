<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPost;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('task/' , 'tasks.index')
    ->middleware(['auth'])
    ->name('task.index');
        

Route::view('task/create/' , 'tasks.create')
   ->middleware(['auth'])
   ->name('task.create');

Route::view('task/{task}/edit' , 'tasks.edit')
   ->middleware(['auth'])
   ->name('task.edit');



/*
Route::view('posts/', 'posts.index')
    ->middleware(['auth'])
    ->name('posts.index');

Route::view('posts/create', 'posts.create')
    ->middleware(['auth'])
    ->name('posts.create');
*/
require __DIR__.'/auth.php';
