<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>



@auth
    @if (Auth::user()->email == 'admin@gmail.com')

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

<div class="container  w-75">
        <h3 class="text-center">Liste des livre loués</h3>
        <table class="table shadow table-bordered">
            <thead>
                <tr>

                    <th>Id_book</th>
                    <th>Titre</th>
                    <th>User</th>
                    <th>Date de Location </th>
                    <th>Date de retour</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $item)
                <tr>
                    <td>{{$item->book_id}}</td>
                    <td>{{ $book[$item->book_id] }}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->date_location}}</td>
                    <td>{{$item->date_retour}}</td>
                    <td>
                        <a href="{{'/abonnement/'.$item->book_id}}" class="btn btn-outline-primary">Valider</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{$locations->links()}}
    </div>
</div>
    @endif
@endauth
    @auth
        @if ( Auth::user() && Auth::user()->email != 'admin@gmail.com' )
            <div class="container w-50 m-auto mt-5">
                <p class="text-center alert alert-success">Votre demande de location a bien été envoyé!</p>
            </div>
        @endif
    @endauth


</x-custom-layout>
