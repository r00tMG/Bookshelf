<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>



    
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
                    <th>Book</th>
                    <th>User</th>
                    <th>Date de Location </th>
                    <th>Date de retour</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $item)
                <tr>
                    <td>{{$item->book_id}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->date_location}}</td>
                    <td>{{$item->date_retour}}</td>
                    
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

</div>
    


</x-custom-layout>
