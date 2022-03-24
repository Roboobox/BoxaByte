<?php

use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MusicCommandController;
use App\Http\Controllers\MusicLogController;
use App\Http\Controllers\NotepadController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VerifyController;
use App\Http\Middleware\VerifiedUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([VerifiedUser::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/upload', [UploadController::class, 'create'])->name('upload');

    Route::post('/upload', [UploadController::class, 'store'])->name('post_upload');

    Route::get('/dir/{directory:hash}', [DirectoryController::class, 'index'])->name('directory');
    Route::get('/dir/{directory:hash}/download-zip', [DownloadController::class, 'createZip'])->name('download-zip');
    Route::get('/dir/{directory:hash}/download', [DownloadController::class, 'create'])->name('download');
    Route::post('/dir/{directory:hash}/delete', [DirectoryController::class, 'delete'])->name('delete-dir');

    Route::get('/files', [FileController::class, 'index'])->name('files');

    Route::get('/notepad/{notepad:hash?}', [NotepadController::class, 'index'])->name('notepad');
    Route::post('/notepad/update', [NotepadController::class, 'update'])->name('notepad-update');
    Route::post('/notepad/create', [NotepadController::class, 'create'])->name('notepad-create');
    Route::post('/notepad/delete/{notepad:hash}', [NotepadController::class, 'delete'])->name('notepad-delete');

    Route::get('/rpi/music-logs', [MusicLogController::class, 'index'])->middleware(['auth'])->name('rpi-dashboard');
    Route::get('/rpi/music-logs/{musicLog:id}', [MusicLogController::class, 'view'])->middleware(['auth'])->name('rpi-music-log-view');
    Route::get('/rpi/music-commands', [MusicCommandController::class, 'index'])->middleware(['auth'])->name('rpi-music-cmd');
    Route::get('/rpi/bot-logs', [LogController::class, 'index'])->middleware(['auth'])->name('rpi-bot-logs');
    Route::get('/rpi/bot-logs/{log:id}', [LogController::class, 'view'])->middleware(['auth'])->name('rpi-bot-log-view');
});

Route::get('/verify', [VerifyController::class, 'index'])->middleware('auth')->name('verify');

require __DIR__.'/auth.php';
