<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Editar Usuario</title>
</head>
<body>
<div>
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="btn btn-warning col-1 container" href="{{ route('verUsers') }}">Volver</a>
    </nav>
</div>
<section class="container">
    <h1>Editar Usuario</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><h6 class="alert alert-danger"> {{ $error }} </h6></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateUser') }}" method="POST">
        @csrf
        @method('POST')
        <!-- Campo no editable para el DNI -->
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" value="{{ $user->dni }}" readonly>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ $user->nombre }}" >
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ $user->apellidos }}" >
        </div>
        <div class="form-group">
            <label for="nick">Nick</label>
            <input type="text" class="form-control" name="nick" placeholder="nick" value="{{ $user->nick }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ $user->password }}" >
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}">
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" name="rol">
                <option value="user" {{ $user->rol === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</section>
</body>
</html>
