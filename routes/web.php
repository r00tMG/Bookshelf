<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $books = Book::all();
    return view('dashboard')->with('books',$books);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('books',BookController::class);

// Affichage des articles 
Route::get('/article',function(){

    $books = Book::all();
    return view('book/article')->with('books',$books);
})->name('books.article');


Route::get('/search', [BookController::class,'search'])->name('books.search');

Route::get('/filter',[BookController::class,'filterBy'])->name('books.filter');

Route::get('location/create/{id}',[LocationController::class,'createLocation'])->name('location.create');
// Route::resource('location',LocationController::class);