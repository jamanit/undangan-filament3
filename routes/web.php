<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/inboxes/store', [App\Http\Controllers\HomeController::class, 'inbox_store'])->name('inboxes.store');
Route::get('/templates', [App\Http\Controllers\HomeController::class, 'template'])->name('templates.index');
Route::get('/templates/show/{parameter?}', [App\Http\Controllers\HomeController::class, 'template_show'])->name('templates.show');
Route::get('/{invitation_id?}/{wedding_couple_name?}/{guest_name?}', [App\Http\Controllers\HomeController::class, 'invitaion_show'])->name('invitations.show');
