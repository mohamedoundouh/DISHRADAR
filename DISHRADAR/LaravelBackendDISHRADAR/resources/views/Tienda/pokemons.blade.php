<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<!-- Nav bar-->
<div>

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
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
                    <a class="nav-link link-danger" href="{{route('logout')}}">Log out<span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Vista de la tabla-->
<div class="container mt-4">
    @if(session('successUpdate'))
        <div>
            <h6 class="alert alert-success"> {{session('successUpdate')}} </h6>
        </div>
    @endif
    <section class="container ver_pokemons">
        <table class="mt-4 table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Nivel</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>

            </tr>
            </thead>
            <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <th scope="row">{{ $pokemon->id }}</th>
                    <td>{{ $pokemon->nombre }}</td>
                    <td>{{ $pokemon->tipo }}</td>
                    <td>{{ $pokemon->nivel }}</td>
                    <td>{{ $pokemon->descripcion }}</td>
                    <td>{{ $pokemon->stock }}</td>
                    <td>{{ $pokemon->precio }} $</td>
                    <td>
                        <a href="" class="btn btn-warning"><i class="bi bi-plus">+</i></a>
                        <a href="" class="btn btn-warning"><i class="bi bi-dash"> - </i></a>
                        @if( Auth::check() && Auth::user()->rol == 'admin')
                            <a href="{{route('editPokemon' , ['id' => $pokemon->id])}}" class="btn btn-warning"><i class="bi bi-dash">Editar</i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <br>
    <!-- Añadir en la tabla-->
    <section class="container">
        <h1>Añadir pokemons</h1>
        <div>
            @if(session('successStore'))
                <div>
                    <h6 class="alert alert-success"> {{session('successStore')}} </h6>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><h6 class="alert alert-danger"> {{ $error }} </h6></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{route('storePokemon')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" name="tipo">
                    @foreach(['eléctrico', 'bicho', 'fuego', 'agua', 'planta', 'roca', 'hielo', 'veneno', 'volador'] as $option)
                        <option value="{{ $option }}" {{ old('tipo') === $option ? 'selected' : '' }}>
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nivel">Nivel</label>
                <input type="number" class="form-control" name="nivel" placeholder="Nivel" value="{{ old('nivel') }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion" value="{{ old('descripcion') }}">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="stock" value="{{ old('stock') }}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" placeholder="precio" value="{{ old('precio') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </section>
    <br>
    <!-- Borrar tabla-->
    <section class="container borrar_pokemons">
        <h1>Borrar pokemons</h1>

        @if(session('successDestroy'))
            <div class="alert alert-success">
                {{ session('successDestroy') }}
            </div>
        @endif

        @if(session('errorDestroy'))
            <div class="alert alert-danger">
                {{ session('errorDestroy') }}
            </div>
        @endif

        <form method="POST"  action="{{route('destroyPokemon')}}">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="idSolicitado">ID a Borrar:</label>
                <input type="text" name="idSolicitado" class="form-control" placeholder="Ingrese el ID">
            </div>
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </section>
</div>
</body>
</html>
