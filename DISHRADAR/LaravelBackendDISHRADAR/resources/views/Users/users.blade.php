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
    <section class="container">
        <table class="mt-4 table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Dni</th>
                <th scope="col">Nick</th>
                <th scope="col">nombre</th>
                <th scope="col">apellidos</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">fecha_nacimiento</th>
                <th scope="col">rol</th>


            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>

                    <th scope="row">{{ $user->dni }}</th>
                    <td>{{ $user->nick }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->apellidos }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->fecha_nacimiento}}</td>
                    <td>{{ $user->rol}}</td>
                    <td>
                        @if( Auth::check() && Auth::user()->rol == 'admin')
                            <a href="{{route('editUser',['id' => $user->dni])}}" class="btn btn-warning"><i
                                    class="bi bi-dash">Editar</i></a>
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
        <h1>Añadir Usuario</h1>
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
        <form action="{{ route('storeUser') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dni">Dni</label>
                <input type="number" class="form-control" name="dni" placeholder="dni" value="{{ old('dni') }}">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="nombre" value="{{ old('nick') }}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos"
                       value="{{ old('apellidos') }}">
            </div>
            <div class="form-group">
                <label for="nick">Nick</label>
                <input type="text" class="form-control" name="nick" placeholder="nick" value="{{ old('nick') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento"
                       value="{{ old('fecha_nacimiento') }}">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" name="rol">
                    <option value="user" {{ old('rol') === 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ old('rol') === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>

    <br>
    <!-- Borrar de la tabla-->
    <section class="container">
        <h1>Borrar Usuario</h1>

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

        <form action="{{ route('destroyUser') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="dniSolicitado">DNI a Borrar:</label>
                <input type="text" name="dniSolicitado" class="form-control" placeholder="Ingrese el DNI">
            </div>
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
    </section>

</div>
</body>
</html>
