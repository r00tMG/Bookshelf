<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="container btn-light arounded shadow my-5 p-5">
        <h3 class="text-center my-3">{{$titre}}</h3>
        <form class="form-group" action="{{route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="text" name="titre" value="{{$book->titre}}" placeholder="Titre du livre" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <input required type="text" name="auteur" value="{{$book->auteur}}" placeholder="Auteur du livre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input required type="file" name="livreFile"  placeholder="File du livred" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="date" name="date_publication" value="{{$book->date_publication}}" placeholder="Date de publication" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select required selected class="form-control" name="genre" id="">
                                <option value="{{$book->genre}}">{{$book->genre}}</option>
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
                                <option value="{{$book->category}}">{{$book->category}}</option>
                                <option value="Roman">Roman</option>
                                <option value="Lettre">Lettre</option>
                                <option value="Poésie">Poésie</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select required class="form-control" name="status" id="">
                                <option value="{{$book->status}}">{{$book->status}}</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Disponible">Non Disponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="submit" name="" class="btn  btn-primary" value="Publier" id="">
                    </div>
                </div>
            </div>
        </form>
    </div>


</x-custom-layout>