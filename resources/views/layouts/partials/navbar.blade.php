<nav class="navbar navbar-expand-sm navbar-dark bg-secondary rounded text-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Mis Tareas" width="32px">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('index') }}" aria-current="page"><span
                            class="visually-hidden">Index</span></a>
                </li>
                @if (Route::has('login'))
                    @auth

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">{{ __('Log Out') }}</a>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Opciones</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('tasks.index') }}">Mis Tareas</a>

                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </li>
                    @endauth
                @endif


            </ul>
        </div>
    </div>
</nav>
