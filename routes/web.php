<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/symlink', function () {
    // Cek jalur target
    $target = $_SERVER['DOCUMENT_ROOT'];
    // $link = $_SERVER['DOCUMENT_ROOT'] . "/storage";
    $link = $_SERVER['DOCUMENT_ROOT'] . '/../public_html/undangbae.site';


    print_r($target);
    exit();

    // Debug: Cek apakah jalur target valid
    if ($target === false) {
        die('Jalur target tidak ditemukan.');
    }

    // Hapus symlink lama jika ada
    if (is_link($link)) {
        unlink($link);
    }

    // Buat symlink baru
    if (symlink($target, $link)) {
        echo "Symbolic link berhasil dibuat: " . $link;
    } else {
        echo "Gagal membuat symbolic link.";
    }
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/inboxes/store', [App\Http\Controllers\HomeController::class, 'inbox_store'])->name('inboxes.store');
Route::get('/templates', [App\Http\Controllers\HomeController::class, 'template'])->name('templates.index');
Route::get('/templates/show/{parameter?}', [App\Http\Controllers\HomeController::class, 'template_show'])->name('templates.show');

Route::post('/invitations/send_message', [App\Http\Controllers\HomeController::class, 'send_message'])->name('invitations.send_message');
Route::get('/invitations/get_message', [App\Http\Controllers\HomeController::class, 'get_message'])->name('invitations.get_message');
Route::get('/{invitation_id?}/{wedding_couple_name?}/{guest_name?}', [App\Http\Controllers\HomeController::class, 'invitaion_show'])->name('invitations.show');
