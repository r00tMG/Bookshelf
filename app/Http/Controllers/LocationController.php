<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class LocationController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $book = Book::find($id);
        
        // $title = "Valider la location de".$book->titre;
        return view('location.create_location',[
            'book'=>$book,
            // 'titre'=>$title
        ]);
    }
   
    
    public function locationBook(Request $request,$id)
    {
        $book = Book::find($id);
        // dd($book);
        if ($book->status != 'Disponible') {
            return redirect()->back()->with('error', 'Le livre n\'est pas disponible');
        }
        $location = Location::create($request->all());

        return to_route('location.index')
        ->with('book',$book)
        ->with('location',$location)
        ->with('success','votre demande a été bien envoyée');
    }
    public function index()
    {
        $locations = Location::paginate(5);
        foreach ($locations as $value) {
            $books = [];
            $book = [];
        //     # code...
            $books[] = $value->book_id;
        }
        for ($i=0; $i <count($books) ; $i++) { 
            # code...
            $book[] = Book::where($books[$i],'=','id');
        }
        // dd($book);

        return view('location.index_location',[
            'locations'=>$locations,
            'book'=>$book
        ]);
    }

    public function retourBook(Location $location, $id)
    {
        $location = Location::findOrFail($id);
        $book = $location->book_id;

        if ($location->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à faire cette action');
        }

        $location->date_retour = now();
        $location->save();

        $book->status = 'Disponible';
        $book->save();

        return redirect()->route('location.index')->with('success', 'Book returned successfully');
    }

    

    
}
