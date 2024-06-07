<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    //
    // public function index(){
    //     $location = Location::all();
    //     return view('location.show_location',compact('location'));
    // }
    // public function show(string $id)
    // {
    //     $book = new BookController();
    //     $piece  = $book->show($id);
    //     dd($piece->id);
    //     return view('location.create_location',compact($piece));
    // }

    public function createLocation(string $id)
    {
        $book = Book::find($id);
        dump($book->$id);
        $titre = "Validez la location de vote livre";
        return view('location.create_location',compact('titre'));
    }

    public function showBook()
    {
        $books = Book::where('status', 'Disponible')->get();
        return view('book.index', compact('books'));
    }

    public function locationBook(Request $request, $id)
    {
        $book = Book::find($id);
        if($book->staus !== 'Disponible')
        {
            return view('book.show_book')->with('erro','Le livre que vous avez choisi est indisponible');
        }
        $location = Location::create($request->all());
        return view('book.show_index',compact($location))->with('La location a été faite avec succés');
    }

    public function RetourBook(Request $request,$id)
    {
        $location = Location::find($id);
        $book = $location->book_id;

        if($location->user_id !== Auth::id())
        {
            return view('book.show_indew')->with('error','Vous êtes pas autorisé à faire cette action');
        }
        $location->date_retour = now();
        $location->save();

        $book->status = 'Disponible';
        $book->save();
        return view('book/show_book',compact($location,$book))->with('success','Livre returné avec succés');
    }

    // public function showMyLocation()
    // {
    //     $location = Auth::user()->location()->with('book')->get();
    //     return view('location.index', compact('location'));
    // }




}
