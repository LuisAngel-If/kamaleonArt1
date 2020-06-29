@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="header header-primary text-center" style="background: linear-gradient(60deg, #1f6273, #347b8d);">
                            <h4>Iniciar sesión</h4>
                            <!-- <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> -->
                        </div>
                        <p class="text-divider">Ingresa los datos</p>
                        <div class="content">

                          

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input class="form-control" placeholder="Correo electrónico..." id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input placeholder="Contraseña..." id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div> 
                            <!--   <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>-->
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg" style="color: #3d898f;">Iniciar
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
@endsection
