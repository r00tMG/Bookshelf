<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>
@dump($books)
<div class="container my-5 w-25-m-auto">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form class="form-group" action="{{ route('books.filter') }}" method="GET" role="search">
                <input class="form-control me-2"  name="filter" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</div>
{{-- @dump(request()->has('filter')) --}}
{{-- @if(request()->has('filter')) --}}
    {{-- @if ($results->isEmpty()) --}}
    <p class="text-danger">Aucun résultats n'a été trouvé</p>
    {{-- @else --}}
        {{-- @foreach ($results as $item) --}}
        <div class="col-md-3">
            <div class="card m-3" style="width: 15rem;">
                <p class="card-text text-center text-muted">Publié le 
                    {{-- {{ $item->created_at->format('d-m-Y à H:i') }} --}}
                </p>
                {{-- <embed src="{{asset('storage/'.$item->livreFile)}}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    {{-- <h5 class="card-title text-center">{{$item->titre}}</h5> --}}
                    {{-- <p class="card-text text-center">{{$item->auteur}}</p> --}}
                    {{-- <p class="text-center"><a href="{{ route('books.show',$item->id) }}" >Voir plus...</a></p> --}}
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    {{-- @endif --}}
    
    
{{-- @else --}}

<div class="container mt-5">
    <div class="row">
        {{-- @foreach ($books as $book) --}}
            {{-- @dump($book) --}}
            <div class="col-md-3">
                <div class="card m-3" style="width: 15rem;">
                    <p class="card-text text-center text-muted">Publié le 
                        {{-- {{ $book->created_at->format('d-m-Y à H:i') }} --}}
                    </p>
                    {{-- <embed src="{{asset('storage/'.$book->livreFile)}}" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        {{-- <h5 class="card-title text-center">{{$book->titre}}</h5> --}}
                        {{-- <p class="card-text text-center">{{$book->auteur}}</p> --}}
                        {{-- <p class="text-center"><a href="{{ route('books.show',$book->id) }}" >Voir plus...</a></p> --}}
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}
    </div>

</div>
    
{{-- @endif --}}

</x-custom-layout>