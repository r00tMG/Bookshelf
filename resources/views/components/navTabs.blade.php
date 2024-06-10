<ul class="nav nav-tabs mt-5">
    <li class="nav-item">

      <a @class(['nav-link link-dark', 'active'=>request()->route()->getName() === 'books.index']) aria-current="page" href="{{route('books.index')}}">Read</a>
      {{-- <a class="nav-link @if(request()->route()->getName() === 'books.index') active @endif" aria-current="page" href="{{route('books.index')}}">Read</a> --}}
    </li>
    <li class="nav-item">
      <a class="nav-link link-dark @if(request()->route()->getName() === 'books.create') active @endif" href="{{route('books.create')}}">Publier</a>
    </li>
    <li class="nav-item">
      <a class="nav-link link-dark @if(request()->route()->getName() === 'location.index') active @endif" href="{{route('location.index')}}">Liste abonnement</a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" aria-disabled="true">Disabled</a>
    </li> --}}
    {{-- @dump() --}}
</ul>
