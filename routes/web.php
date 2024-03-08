<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagiaireController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('stagiaires',StagiaireController::class);
Route::resource('modules',ModuleController::class);
Route::get('/notes/{id?}',[NoteController::class,'index']);
Route::get('/create/{id?}',[NoteController::class,'create']);
Route::post('/notes',[NoteController::class,'store']);
Route::get('/notes/{module}/{stagiaire}',[NoteController::class,'edit']);
Route::put('/notes/{module}/{stagiaire}',[NoteController::class,'update']);
Route::delete('/notes/{module}/{stagiaire}',[NoteController::class,'destroy']);