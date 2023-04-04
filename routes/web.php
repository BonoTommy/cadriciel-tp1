<?php

use App\Http\Controllers\EtudiantController;
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

/*Route::get('/', function () {
    return view('etudiants.index');
});*/

Route::get('/', [EtudiantController::class, 'home'])->name('accueil');
Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('etudiant-ajout', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('etudiant-ajout', [EtudiantController::class, 'store']);
Route::get('etudiant-modifier/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('etudiant-modifier/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');


