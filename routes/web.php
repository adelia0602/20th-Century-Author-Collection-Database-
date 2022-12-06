<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LiteratureController;
use App\Http\Controllers\TypeController;

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
    return redirect()->route ('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




Route::get('/author', [AuthorController::class,'read'])->name('author');
Route::get('/authoradd', [AuthorController::class,'add'])->name('authoradd');
Route::post('/insertauthor', [AuthorController::class,'insert'])->name('insertauthor');
Route::get('/showauthor/{id_aut}', [AuthorController::class,'showauthor'])->name('showauthor');
Route::post('/updateauthor/{id_aut}', [AuthorController::class,'updateauthor'])->name('updateauthor');
Route::get('/deleteauthor/{id_aut}', [AuthorController::class,'delete'])->name('deleteauthor');
Route::get('/softdeleteaut/{id_aut}', [AuthorController::class,'softDelete'])->name('softdeleteaut');


Route::get('/type', [TypeController::class,'read'])->name('type');
Route::get('/typeadd', [TypeController::class,'add'])->name('typeadd');
Route::post('/insertype', [TypeController::class,'insert'])->name('insertype');
Route::get('/showtype/{id_type}', [TypeController::class,'showtype'])->name('showtype');
Route::post('/updatetype/{id_type}', [TypeController::class,'updatetype'])->name('updatetype');
Route::get('/deletetype/{id_type}', [TypeController::class,'delete'])->name('deletetype');



Route::get('/literature', [LiteratureController::class,'read'])->name('literature');
Route::get('/literatureadd', [LiteratureController::class,'add'])->name('literatureadd');
Route::post('/insertlit', [LiteratureController::class,'insert'])->name('insertlit');
Route::get('/showliterature/{id_lit}', [LiteratureController::class,'showliterature'])->name('showliterature');
Route::post('/updateliterature/{id_lit}', [LiteratureController::class,'updateliterature'])->name('updateliterature');
Route::get('/deletelit/{id_lit}', [LiteratureController::class,'delete'])->name('deletelit');
Route::get('/softdeletelit/{id_aut}', [LiteratureController::class,'softDelete'])->name('softdeletelit');

});


require __DIR__.'/auth.php';
