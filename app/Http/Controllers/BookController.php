<?php

namespace App\Http\Controllers;

use App\Models\BibliothequeOfUser;
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
        return redirect()->route('books.index')->with('success','Votre livre a été bien créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd($id);
        $book = Book::find($id);
        $titre = "Consultation du livre ".$book->titre;
        return view('book.show_book')
        ->with('book',$book)
        ->with('titre',$titre)
        ;
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
        return redirect()->route('books.index')->with('success','Votre livre a été bien modifié');

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
        $search = $request->input('search');
        // dd($search);
        // dump($request);
        $results = Book::where('titre', 'like', "%$search%")
            ->orWhere('auteur','like', "%$search%")
            ->orWhere('category','like', "%$search%")
            ->orWhere('genre','like', "%$search%")
            ->get();
        $titre = "Résultats de la recherche pour \"$search\"";
        // var_dump($results);

        return view('book/index_book',compact('results','titre'));
    }
    public function filterBy(Request $request)
    {
        $filter = $request->input('filter');
        // dd($search);
        // dump($request);
        $results = Book::where('titre', 'like', "%$filter%")
            ->orWhere('auteur','like', "%$filter%")
            ->orWhere('category','like', "%$filter%")
            ->orWhere('genre','like', "%$filter%")
            ->get();
        $titre = "Résultats de la recherche pour \"$filter\"";
        // var_dump($results);
        return view('book/article')->with('results',$results)->with('titre',$titre);
    }
    public function abonnement(Request $request,$id)
    {

        $books = Book::find($id);
        $data = $request->input();
        // dd($request->input());
        $data['livreFile'] = $books->livreFile;
        // dd($data);
        // $books->update($data);
        return view('book.abonner')->with('books',$books)->with('livre',$data['livreFile']);
        
    }    
    public function bibliothequeUsers(Request $request)
    {
        $books = $request->all();
        $bibs =  BibliothequeOfUser::create($books);
        $livres = $bibs->all();
        return view('book.bibliotheque',[
            'livres'=>$livres
        ]);

    }
    
    
}
