<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProprieteController;
use App\Http\Controllers\Admin\OptionController;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/biens', [ProprieteController::class, 'index'])->name('propriete.index');

Route::get('/biens/{slug}-{propriete}', [App\Http\Controllers\ProprieteController::class, 'show'])->name('propriete.show')->where([
    'propriete' => $idRegex,
    'slug' => $slugRegex
]);



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
 Route::resource('propriete', App\Http\Controllers\Admin\ProprieteController::class)->except(['show']);
    Route::resource('option', App\Http\Controllers\Admin\OptionController::class)->except(['show']);

});

Route::post('/biens/{id}/contact', [ProprieteController::class, 'contact'])->name('propriete.contact')
->where([
    'propriete' => $idRegex,
]);


// Route::get('/base', function () {
//     return view('layouts.base');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
->middleware('guest')
->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'dologin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
->middleware('auth')
->name('logout');
//Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
//Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');


//Route::get('/proprietes', [\App\Http\Controllers\ProprieteController::class, 'index'])->name('propriete.index');