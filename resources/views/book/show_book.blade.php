
@extends('dashboard')

@section('create_book')
@include('navTabs')

    <div class="container btn-light arounded shadow my-5 p-5">
        <h3 class="text-center my-3">{{$titre}}</h3>
        <form class="form-group" action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="text" name="titre" placeholder="Titre du livre" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <input required type="text" name="auteur" placeholder="Auteur du livre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input required type="file" name="livreFile" placeholder="File du livred" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="date" name="date_publication" placeholder="Date de publication" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select required selected class="form-control" name="genre" id="">
                                <option value="">choisir une genre</option>
                                <option value="12">12</option>
                                <option value="12">12</option>
                            </select>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <select required selected class="form-control" name="category" id="">
                                <option value="">choisir une category</option>
                                <option value="12">12</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select required class="form-control" name="status" id="">
                                <option value="">choisir un status</option>
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
@endsection