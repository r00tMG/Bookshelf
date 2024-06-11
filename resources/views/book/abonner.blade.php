<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    

    <div class="container btn-light arounded shadow my-5 p-5">
        {{-- <h3 class="text-center my-3">{{$titre}}</h3> --}}
        <form class="form-group" action="{{route('books.bibliotheque')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="text" name="titre" value="{{$books->titre}}" placeholder="Titre du livre" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <input required type="text" name="auteur" value="{{$books->auteur}}" placeholder="Auteur du livre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input  type="text" name="livreFile" value="{{$books->livreFile}}" placeholder="File du livre" class="form-control">
                            <span></span>
                            </input>
                            {{-- @dump($books) --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="date" name="date_publication" value="{{$books->date_publication}}" placeholder="Date de publication" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select required selected class="form-control" name="genre" id="">
                                <option value="{{$books->genre}}">{{$books->genre}}</option>
                                <option value="Naratif">Naratif</option>
                                <option value="Théatral">Théatral</option>
                                <option value="Poétique">Poétique</option>
                                <option value="Argumentatif">Argumentatif</option>
                                <option value="Epistolaire">Epistolaire</option>
                            </select>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <select required selected class="form-control" name="category" id="">
                                <option value="{{$books->category}}">{{$books->category}}</option>
                               <option value="Roman">Roman</option>
                                <option value="Lettre">Lettre</option>
                                <option value="Poésie">Poésie</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select required class="form-control" name="status" id="">
                                <option value="{{$books->status}}">{{$books->status}}</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Disponible">Non Disponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="submit" name="" class="btn  btn-primary" value="Envoyer" id="">
                    </div>
                </div>
            </div>
        </form>
        
            
            

    </div>
</x-custom-layout>