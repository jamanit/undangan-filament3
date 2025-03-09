<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/templates/{parameter?}', [App\Http\Controllers\TemplateController::class, 'index'])->name('templates.index');
Route::get('/{invitation_id?}/{wedding_couple_name?}/{guest_name?}', [App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.index');
