<nav class="navbar navbar-expand-lg navbar-light bg-white static-top shadow-sm mb-3">
    <div class="container">
        {{-- <a class="navbar-brand fw-bolder text-primary small" href="/">SP</a> --}}
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/SP.png') }}" alt="" width="150" height="auto">
          </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if (Auth::user()->rol == 'admin')
                    <div class="nav-item dropdown mx-2 {{ request()->is('promotores*') || request()->is('docentes*')  ? 'border-2 border-bottom border-primary' : '' }}">
                        <a class="nav-link {{ request()->is('promotores*') || request()->is('docentes*')  ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Personal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="{{ route('promotores.index') }}" class="dropdown-item">Promotores</a></li>
                            <li><a href="{{ route('docentes.index') }}" class="dropdown-item">Docentes</a></li>
                            @if (auth()->user()->sucursal == 'all')
                                <li><a href="{{ route('permisos.adm') }}" class="dropdown-item">Adm.</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="nav-item dropdown mx-2">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="{{ route('caja.index') }}" class="dropdown-item">Caja</a></li>
                            <li><a href="{{ route('mensajes.index', 'global') }}" class="dropdown-item">Mensajes</a>
                            </li>
                            <li><a href="{{ route('reportes.index') }}" class="dropdown-item">Reportes</a></li>
                            <li><a href="{{ route('cursos.index') }}" class="dropdown-item">Cursos</a></li>
                        </ul>
                    </div>

                @endif

                @if (Auth::user()->rol == 'docente' || Auth::user()->rol == 'admin')
                    <x-itembar when="grupo" text="Grupos" route="grupos.index"></x-itembar>
                @endif

                @if (Auth::user()->rol == 'promotor' || Auth::user()->rol == 'admin')
                    <x-itembar when="matricula" text="Matriculas" route="matriculas.index"></x-itembar>
                @endif
            </ul>

            <div class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name ?? '' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (auth()->user()->rol != 'alumno')
                        <li><a href="{{ route('user.edit', auth()->user()->id) }}" class="dropdown-item">Perfil</a></li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
