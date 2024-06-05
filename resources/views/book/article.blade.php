@extends('dashboard')
@section('article')

<div class="container mt-5">
    <div class="row">
        @foreach ($books as $book)
            {{-- @dump($book) --}}
            <div class="col-md-3">

                <div class="card m-3" style="width: 15rem;">
                    <p class="card-text text-center text-muted">Publié le 
                        @php 
                        echo $book->created_at->format('d-m-Y à H:i')
                        @endphp 
                    </p>
                    <embed src="{{asset('storage/'.$book->livreFile)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$book->titre}}</h5>
                        <p class="card-text text-center">{{$book->auteur}}</p>
                        <p class="text-center"><a href="" >Voir plus...</a></p>
                    </div>
                </div>
            </div>
    
        @endforeach
    </div>
</div>




@endsection