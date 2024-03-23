

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" 
        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav nav-pills">
            <li class="nav-item ">
              <a class="nav-link  @if(Str::is("",  Route::currentRouteName())) active @endif" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("drills*",  Route::currentRouteName())) active @endif" href="{{ route('drills.index') }}">Drills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("session*",  Route::currentRouteName())) active @endif" href="{{ route('sessions.index') }}">Sessions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("tags*",  Route::currentRouteName()))  active @endif" href="{{ route('tags.index') }}">Tags</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("roles*",  Route::currentRouteName()))  active @endif" href="{{ route('roles.index') }}">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("users*",  Route::currentRouteName()))  active @endif" href="{{ route('users.index') }}">Users</a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
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
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
      </div>
    </div>
  </nav>