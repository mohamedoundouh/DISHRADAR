
<div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <div class="container">
        <hr>
        <aside class="col-sm-4">
        </aside>

        <aside class="container col-sm-4">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Register</h4>
                    <hr>
                    <!-- Gestion de errores  -->
                    @if (session('RegSuccess'))
                        <div class="alert alert-success">
                            {{ session('RegSuccess') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <!-- dni  -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="dni" class="form-control" placeholder="dni" type="text">
                            </div>
                        </div>
                        <!-- email  -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="email" class="form-control" placeholder="Email" type="email">
                            </div>
                        </div>
                        <!-- nick  -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nick" class="form-control" placeholder="Nick" type="text">
                            </div>
                        </div>
                        <!-- nombre  -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nombre" class="form-control" placeholder="nombre" type="text">
                            </div>
                        </div>

                        <!-- password  -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password" class="form-control" placeholder="Contraseña" type="password">
                            </div>
                        </div>




                        <!-- apellidos -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="apellidos" class="form-control" placeholder="Apellidos" type="text">
                            </div>
                        </div>
                        <!-- fecha_nacimiento -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><p class="text-group text-base">nacimento</p></span>

                                </div>
                                <input name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento" type="date">
                            </div>
                        </div>


                        <!--  rol -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <select name="rol" class="form-select form-control">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <input  type="submit" class="btn btn-primary btn-block">
                        </div>
                        <p class="text-center"><a href="{{route('verLog')}}" class="btn">login</a></p>
                    </form>
                </article>
            </div> <!-- card.// -->

        </aside> <!-- col.// -->

    </div> <!-- row.// -->
</div>
<!--container end.//-->


</div>
