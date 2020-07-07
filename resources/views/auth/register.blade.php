@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')

<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">

                
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                        <div class="header header-primary text-center" style="background: linear-gradient(60deg, #1f6273, #347b8d);">
                            <h4>Registro</h4>
                            <!-- <div class="social-line">
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> -->
                        </div>
                        <p class="text-divider">Completa tus datos</p>
                        <div class="content">

                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
							</div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Apellido Paterno" name="Ap" value="{{ old('Ap') }}" required>
							</div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Apellido Materno" name="Am" value="{{ old('Am') }}" required>
							</div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input class="form-control" placeholder="Correo electrónico" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">phone</i>
                                </span>
                                <input id="phone" type="phone" placeholder="Teléfono" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>                            

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">class</i>
                                </span>
                                <input id="address" type="text" placeholder="Dirección" class="form-control" name="address" value="{{ old('address') }}" required>
                            </div> 

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input placeholder="Confirmar tu contraseña" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <!--   <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>-->
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg" style="color: #3d898f;">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    @include('includes.footer')
</div>

@endsection
