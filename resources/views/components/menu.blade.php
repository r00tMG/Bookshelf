<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <a class="nav-link @if(request()->route()->getName() === 'dashboard') active @endif" aria-current="page" href="{{ route('dashboard') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link  btn btn-outline-primary"  aria-current="page">Log Out</button>
                </form>
              </li>
              {{-- @dump($results) --}}
        </ul>
        {{-- @dump(request()->user()) --}}
        
      </div>

    </div>
  </nav>
