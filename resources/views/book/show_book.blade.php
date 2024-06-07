<x-custom-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>


<style>
#sizeCard{
    width: 30rem;
    height: 40rem;
}
</style>
    
<div class="container mt-5">
    <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <div class="card m-3" id="sizeCard">
                    <p class="card-text text-center text-muted">Publié le 
                        {{ $book->created_at->format('d-m-Y à H:i') }}
                    </p>
                    <embed src="{{asset('storage/'.$book->livreFile)}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">{{$book->titre}}</h5>
                        <p class="card-text text-center">{{$book->auteur}}</p>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis aspernatur quia obcaecati ab aliquid provident, totam quis modi reiciendis illum. Nesciunt ducimus veniam officia animi cupiditate distinctio mollitia eaque ratione?</p>

                        <form action="{{ route('location.create',$book->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-outline-primary ">Louer</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
    


</x-custom-layout>
