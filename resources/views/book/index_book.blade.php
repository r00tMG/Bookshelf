<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="container my-5 w-25-m-auto">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form class="form-group" action="{{route('books.search')}}" method="GET" role="search">
                    <input class="form-control me-2"  name="search" placeholder="Search" aria-label="Search">
                    {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                </form>
            </div>
        </div>
    </div>

    @if (isset($_GET['search']))
        
        @if (empty($results))
            <p class="text-danger">Aucun résultats n'a été trouvé</p>
        @endif
        <div class="container p-4">
        <h3 class="text-center">{{$titre}}</h3>
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <thead class="table-primary">
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Date Publication</th>
                            <th>Book</th>
                            <th>Genre</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th colspan="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $book)
                            <tr>
                                
                                <td>{{$book->titre}}</td>
                                <td>{{$book->auteur}}</td>
                                <td>{{$book->date_publication}}</td>
                                <td><embed type="application/pdf" src="{{asset('storage/'.$book->livreFile)}}" width="70px" height="70px"></td>
                                <td>{{$book->genre}}</td>
                                <td>{{$book->category}}</td>
                                <td>{{$book->status}}</td>
                                <td>
                                    <form action="{{ route( 'books.destroy',$book->id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class=" btn btn-outline-danger ">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z"></path></svg>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('books.edit',$book->id) }}" method="">
                                        @csrf
                                        <button type="submit" class=" btn btn-outline-success ">  
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7,17.013l4.413-0.015l9.632-9.54c0.378-0.378,0.586-0.88,0.586-1.414s-0.208-1.036-0.586-1.414l-1.586-1.586	c-0.756-0.756-2.075-0.752-2.825-0.003L7,12.583V17.013z M18.045,4.458l1.589,1.583l-1.597,1.582l-1.586-1.585L18.045,4.458z M9,13.417l6.03-5.973l1.586,1.586l-6.029,5.971L9,15.006V13.417z"></path><path d="M5,21h14c1.103,0,2-0.897,2-2v-8.668l-2,2V19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5	h6.847l2-2H5C3.897,3,3,3.897,3,5v14C3,20.103,3.897,21,5,21z"></path></svg>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a  href="{{ route('books.show',$book->id) }}">
                                        <button type="submit" class=" btn btn-outline-primary ">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-width="2" d="M12,17 C9.27272727,17 6,14.2222222 6,12 C6,9.77777778 9.27272727,7 12,7 C14.7272727,7 18,9.77777778 18,12 C18,14.2222222 14.7272727,17 12,17 Z M11,12 C11,12.55225 11.44775,13 12,13 C12.55225,13 13,12.55225 13,12 C13,11.44775 12.55225,11 12,11 C11.44775,11 11,11.44775 11,12 Z"></path></svg>
                                        </button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        {{-- {{$results->links()}} --}}
        </div>
        
    @else
        <div class="container p-4">
            @if (session('success'))
                <div class="text-center alert-success alert">
                    {{session('success')}}
                </div>
            @endif
            @if (session('error'))
                <div class="text-center alert-danger alert">
                    {{session('error')}}
                </div>
            @endif
        <h3 class="text-center">{{$titre}}</h3>
        <div class="table-responsive">
        <table class="table table-bordered" >
            <thead class="table-primary">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date Publication</th>
                    <th>Book</th>
                    <th>Genre</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th colspan="4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        {{-- @php
                        echo "<pre>";
                            var_dump($book)  ;
                        @endphp --}}
                        <td>{{$book->titre}}</td>
                        <td>{{$book->auteur}}</td>
                        <td>{{$book->date_publication}}</td>
                        <td><embed type="application/pdf" src="{{asset('storage/'.$book->livreFile)}}" width="70px" height="70px"></td>
                        <td>{{$book->genre}}</td>
                        <td>{{$book->category}}</td>
                        <td>{{$book->status}}</td>
                        <td>
                            <form action="{{ route( 'books.destroy',$book->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class=" btn btn-outline-danger ">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z"></path></svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('books.edit',$book->id) }}" method="">
                                @csrf
                                <button type="submit" class=" btn btn-outline-success ">  
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7,17.013l4.413-0.015l9.632-9.54c0.378-0.378,0.586-0.88,0.586-1.414s-0.208-1.036-0.586-1.414l-1.586-1.586	c-0.756-0.756-2.075-0.752-2.825-0.003L7,12.583V17.013z M18.045,4.458l1.589,1.583l-1.597,1.582l-1.586-1.585L18.045,4.458z M9,13.417l6.03-5.973l1.586,1.586l-6.029,5.971L9,15.006V13.417z"></path><path d="M5,21h14c1.103,0,2-0.897,2-2v-8.668l-2,2V19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5	h6.847l2-2H5C3.897,3,3,3.897,3,5v14C3,20.103,3.897,21,5,21z"></path></svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a  href="{{ route('books.show',$book->id) }}">
                                <button type="submit" class=" btn btn-outline-primary ">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-width="2" d="M12,17 C9.27272727,17 6,14.2222222 6,12 C6,9.77777778 9.27272727,7 12,7 C14.7272727,7 18,9.77777778 18,12 C18,14.2222222 14.7272727,17 12,17 Z M11,12 C11,12.55225 11.44775,13 12,13 C12.55225,13 13,12.55225 13,12 C13,11.44775 12.55225,11 12,11 C11.44775,11 11,11.44775 11,12 Z"></path></svg>
                                </button>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{$books->links()}}
    </div>
    @endif
    
</x-custom-layout>