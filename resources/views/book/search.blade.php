@extends('dashboard')
@section('index_book')
@include('navTabs')

    <div class="container p-4">
        {{-- @php
            if(!isset($results)){
                $data = $request;
                var_dump($data);
            }
        @endphp --}}
        @dump($results)
        
        <form class="d-flex" action="{{ route('book.search') }}" method="GET" role="search">
            <input class="form-control me-2" value="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
{{-- {{$results->titre}} --}}
        
        {{-- {{$books->links()}} --}}
    </div>
@endsection

