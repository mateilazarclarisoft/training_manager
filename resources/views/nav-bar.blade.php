

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @if(Route::currentRouteName() == 'drills.index') active @endif" href="{{ route('drills.index') }}">Drills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Str::is("session*",  Route::currentRouteName())) active @endif" href="{{ route('sessions.index') }}">Sessions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::currentRouteName() == 'tags.index') active @endif" href="{{ route('tags.index') }}">Tags</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>