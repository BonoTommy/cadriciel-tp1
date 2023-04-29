<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RepertoireController;
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

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/authentication', [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');
Route::get('myPosts', [BlogPostController::class, 'myPosts'])->name('blog.myPosts');
Route::get('blog-create', [BlogPostController::class, 'create'])->name('blog.create');
Route::post('blog-create', [BlogPostController::class, 'store']);
Route::get('blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit');
Route::put('blog-edit/{blogPost}', [BlogPostController::class, 'update']);
Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy']);

Route::get('repertoire', [RepertoireController::class, 'index'])->name('repertoire.index');
Route::get('repertoire/{repertoire}', [RepertoireController::class, 'show'])->name('repertoire.show');
Route::get('myDocs', [RepertoireController::class, 'myDocs'])->name('repertoire.myDocs');
Route::get('repertoire-create', [RepertoireController::class, 'create'])->name('repertoire.create');
Route::post('repertoire-create', [RepertoireController::class, 'store']);
Route::get('repertoire-edit/{repertoire}', [RepertoireController::class, 'edit'])->name('repertoire.edit');
Route::put('repertoire-edit/{repertoire}', [RepertoireController::class, 'update']);
Route::delete('retpertoire/{repertoire}', [RepertoireController::class, 'destroy'])->name('repertoire.delete');

