<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
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
    // $books = new Book();
    $books = Book::all();
    return view('book/article',compact('books'));
})->name('book.article');
// Route::get('/search',function(Request $request){
//     // $books = new Book();
//     $search = $request->input('search');
//     $results = Book::where('titre','like','%$search%')->get();
//     return redirect()->route('books.index',compact('results'));
//     // return to_route('books.index',compact('results'));
// })->name('book.search');

Route::get('/search', [BookController::class,'search'])->name('book.search');
