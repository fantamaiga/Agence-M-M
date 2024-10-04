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


Route::prefix('admin')->name('admin.')->group(function () {
 Route::resource('propriete', App\Http\Controllers\Admin\ProprieteController::class)->except(['show']);
    Route::resource('option', App\Http\Controllers\Admin\OptionController::class)->except(['show']);

});

Route::get('/interface', function () {
    return view('layouts.mastersite');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);//->name('propriete.show');

//Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
//Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');


//Route::get('/proprietes', [\App\Http\Controllers\ProprieteController::class, 'index'])->name('propriete.index');