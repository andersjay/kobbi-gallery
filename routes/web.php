<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticieController;
use App\Livewire\Gallery;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galeria', [GalleryController::class, 'index'])->name('gallery');

//Exposicoes
Route::get('/exposicoes', [ExhibitionController::class, 'index'])->name('exhibitions');
Route::get('/exposicoes/{id}', [ExhibitionController::class, 'exhibition'])->name('exhibition');

//Noticias
Route::get('/noticias', [NoticieController::class, 'index'])->name('noticies.index');
Route::get('/noticias/{slug}', [NoticieController::class, 'show'])->name('noticies.show');

//Contato
Route::get('/contato', [ContactController::class, 'index'])->name('contact');

