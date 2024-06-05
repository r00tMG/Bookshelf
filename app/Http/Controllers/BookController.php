<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::paginate(5);
        $titre = "Liste des livres";
        return view('book/index_book',compact('books','titre'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $titre = "Publication Books";

        return view('book/create_book',compact('titre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $data = $request->all();
        // dd($data);
        $data['livreFile'] = $request->livreFile->store('uploads');
        Book::create($data);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::findorFail($id);
        $titre = "Consultation du livre ".$book->titre;
        return view('book/show_book',compact('book','titre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::find($id);
        $titre = "Modification du livre ".$book->titre;

        return view('book/edit_book',compact('book','titre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $book = Book::find($id);
        $data = $request->all();
        $data['livreFile'] = $request->livreFile->store('update');
        $book->update($data);
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('serch');
        $results = Book::where('titre', 'like', "%search%")->get();
        return view('book/search',['results'=>$results,'search'=>$search]);
    }
}
