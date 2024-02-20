
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div>
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="btn btn-warning col-1 container" href="{{ route('verPokemons') }} " >Volver</a>
    </nav>
</div>
<section class="container ">
    <h1>Editar Pokemon</h1>
    <form action="{{ route('updatePokemon') }}" method="POST">
        @csrf
        @method('POST')
        <!-- Campo no editable para el ID -->
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $pokemon->id }}" readonly>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ $pokemon->nombre }}">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" name="tipo">
                @foreach(['eléctrico', 'bicho', 'fuego', 'agua', 'planta', 'roca', 'hielo', 'veneno', 'volador'] as $option)
                    <option value="{{ $option }}" {{ $pokemon->tipo === $option ? 'selected' : '' }}>
                        {{ ucfirst($option) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nivel">Nivel</label>
            <input type="number" class="form-control" name="nivel" placeholder="Nivel" value="{{ $pokemon->nivel }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" value="{{ $pokemon->descripcion }}">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" placeholder="Stock" value="{{ $pokemon->stock }}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" placeholder="Precio" value="{{ $pokemon->precio }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</section></body>
</html>
