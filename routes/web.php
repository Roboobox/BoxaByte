<?php

use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\UploadController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware([VerifiedUser::class])->group(function () {
    Route::get('/upload', [UploadController::class, 'create'])->name('upload');

    Route::post('/upload', [UploadController::class, 'store'])->name('post_upload');

    Route::get('/dir/{directory:hash}', [DirectoryController::class, 'index'])->name('directory');
    Route::get('/dir/{directory:hash}/download-zip', [\App\Http\Controllers\DownloadController::class, 'createZip'])->name('download-zip');
    Route::get('/dir/{directory:hash}/download', [\App\Http\Controllers\DownloadController::class, 'create'])->name('download');
    Route::post('/dir/{directory:hash}/delete', [DirectoryController::class, 'delete'])->name('delete-dir');
});

Route::get('/verify', function () {
    return view('verify');
})->middleware('auth')->name('verify');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
