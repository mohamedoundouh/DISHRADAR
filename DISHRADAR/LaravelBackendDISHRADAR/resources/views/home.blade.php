<div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="/pokemons">Tienda<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrito<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="#">Perfil<span class="sr-only">(current)</span></a>
                </li>
                @if( Auth::check() && Auth::user()->rol == 'admin')

                <li class="nav-item active">
                    <a class="nav-link link-warning" href="{{route('verUsers')}}">Usuarios <span class="sr-only">(current)</span></a>
                </li>
                @endif

                <li class="nav-item active">
                    <a class="nav-link link-danger" href="{{route('logout')}}">Log out<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    @if (session('LogSuccess'))
        <div class="alert alert-success">
            {{ session('LogSuccess') }}
        </div>
    @endif
        @if(session('Permisos'))
            <div>
                <h6 class="alert alert-danger"> {{session('Permisos')}} </h6>
            </div>
        @endif
    <h1>hola: {{Auth::user()->nick}}</h1>
</div>
