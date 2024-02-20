<div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <div class="container">
        <hr>
        <aside class="col-sm-4">
        </aside> <!-- col.// -->

        <aside class="container col-sm-4">
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
                        <hr>
                        <!-- Gestion de errores  -->

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('LogError'))
                            <div>
                                <h6 class="alert alert-danger"> {{session('LogError')}} </h6>
                            </div>
                        @endif
                        <form method="POST" action="{{route('logged')}}">
                            @csrf
                            <!-- nick  -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="nick" class="form-control"    placeholder="Nick" type="text">
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                            </div>
                            <p class="text-center"><a href="{{route('verReg')}}" class="btn">Register</a></p>
                        </form>
                    </article>
                </div>
            </aside>
        </div>
    </div>


</div>
