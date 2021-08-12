<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">
        <i class="fas fa-home"></i>  
        Accueil </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('articles') }}">Articles</a>
          </li>          
        </ul>      
        
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
            @if (Auth::user()->role === 'ADMIN')
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route ('articles.index') }}">Espace Admin</a>
                </li>
            @endif
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Deconnexion</button>
              </form>
            </li>
          @endguest
        </ul>
      </div>
    </div>
</nav>