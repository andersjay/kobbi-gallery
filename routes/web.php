<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticieController;
use App\Http\Controllers\ArtistController;
use App\Livewire\Gallery;
use App\Livewire\Welcome;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ExhibitionInterestController;
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
Route::post('/exposicoes/interesse', [ExhibitionInterestController::class, 'send'])->name('exhibition.interest');

//Noticias
Route::get('/noticias', [NoticieController::class, 'index'])->name('noticies');
Route::get('/noticias/{slug}', [NoticieController::class, 'show'])->name('noticies.show');

//Artistas
Route::get('/artistas', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artistas/{id}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/artistas/{id}/imagens', [ArtistController::class, 'images'])->name('artists.images');

//Contato
Route::get('/contato', [ContactController::class, 'index'])->name('contact');

//Agenda
Route::get('/agenda', [App\Http\Controllers\AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/{event}', [App\Http\Controllers\AgendaController::class, 'show'])->name('agenda.show');

//Acervo
Route::get('/acervo', [CollectionController::class, 'index'])->name('acervo.index');
Route::post('/acervo/interesse', [CollectionController::class, 'interesse'])->name('acervo.interesse');

