<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProprieteController;
use App\Http\Controllers\Admin\ProprieteController as AdminProprieteController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\AuthController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

// Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pour afficher la liste des biens
Route::get('/biens', [ProprieteController::class, 'index'])->name('propriete.index');

// Route pour afficher un bien spécifique (détails d'une propriété)
Route::get('/biens/{slug}-{propriete}', [ProprieteController::class, 'show'])
    ->name('propriete.show')
    ->where([
        'propriete' => $idRegex,
        'slug' => $slugRegex
    ]);

// Route pour gérer le contact (demande d'information sur un bien)
Route::post('/biens/{id}/contact', [ProprieteController::class, 'contact'])
    ->name('propriete.contact')
    ->where(['id' => $idRegex]);

// Routes pour la partie administration, protégées par l'authentification
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Gestion des propriétés (CRUD sauf show)
    Route::resource('propriete', AdminProprieteController::class)->except(['show']);
    // Gestion des options (CRUD sauf show)
    Route::resource('option', OptionController::class)->except(['show']);
});

// Routes pour l'authentification
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/test', function () {
    return 'La route fonctionne !';
});
