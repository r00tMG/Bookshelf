<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>
{{-- @dump($book->id) --}}
    <div class="container btn-light arounded shadow my-5 p-5">
        <h3 class="text-center my-3"> </h3>
        <form class="form-group" action="{{route('location.store', ['id' => $book->id])}}" method="POST" >
            @csrf
        <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input required type="text"  name="user_id" value="{{ Auth::id() }}" placeholder="Utilisateur connecté" class="form-control">
                        </div>
                
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <input required type="text"  name="book_id" value="{{ $book->id }}" placeholder="Livre selectionné" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input  type="date" value="{{ now()->format('Y-m-d') }}" name="date_location" placeholder="Date de location " class="form-control">
                        </div>
                        <div class="mb-3">
                            <input  type="date" value="{{ now()->addDays(14)->format('Y-m-d') }}" name="date_retour" placeholder="Date de retour " class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <input type="submit" name="" class="btn  btn-primary" value="Valider" id="">
                    </div>
                </div>
        </div>
        </form>

    </div>
</x-custom-layout>