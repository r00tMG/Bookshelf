<div class="d-flex flex-column  flex-shrink-0  p-3" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BookShelf</font></font></span>
      
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      {{-- @dump(Auth::user()->email) --}}
      {{-- @dump(request()->route()->getName()) --}}

      {{-- @if ( Auth::email() === 'admin@gmail.com' ) --}}
      @auth
          @if (Auth::user()->email == 'admin@gmail.com')
      <li class="nav-item">
        <a href="{{ route('books.index')}}" class="nav-link link-dark @if(request()->route()->getName()==='books.index') active @endif" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          Admin
        </font></font></a>
      </li>
            @endif
      @endauth
      {{-- @endif --}}
      
      <li>
        <a href="{{route('books.article')}}" class="nav-link link-dark @if(request()->route()->getName()==='books.article') active @endif">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          Dashboard
        </font></font></a>
      </li>
      @auth
          @if (Auth::user() && Auth::user()->email != 'admin@gmail.com')
      <li>
        <a href="{{route('books.bibliotheque')}}" class="nav-link link-dark @if(request()->route()->getName()==='books.bibliotheque') active @endif">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          Mes livres
        </font></font></a>
      </li>
          @endif
      @endauth
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                {{-- {{ Auth::user()->email }} --}}
           
          </font></font></strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
          <li><a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nouveau projet...</font></font></a></li>
          <li><a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Paramètres</font></font></a></li>
          <li><a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Profil</font></font></a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">se déconnecter</font></font></a></li>
        </ul>
      </div>
    </ul>
  </div>