<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                </li>
            </ul>

            <div class="d-flex">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/') }}">Start</a>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Afmelden</a>

                            <form id="logout-form" action={{ route('logout') }} method="POST" style="display: none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}">Aanmelden</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registreren</a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>
        </div>
    </div>
</nav>
