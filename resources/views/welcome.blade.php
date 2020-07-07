@extends('layouts.app')

@section('tittle', 'Bienvenido a ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
        }
        .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
        }

        .rounded {
            height: 100px;
            width: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
            background:url("/img") center no-repeat;
            background-size:cover;
            }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
           
            
                <h1 class="title">Bienvenido a {{ config('app.name')
                 }}</h1>
                <h4>Aquí va una descripción de sobre la página o alguna frase</h4>
                <br />
                <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Ver vídeo
                </a> -->
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing" style="padding: 26px 0;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title" style="margin-bottom: 10px;">Servicio</h2>
                    <h5 class="description text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
                </div>
            </div>

           
                <div class="row center">
                    
                    <div class="col-md-4">
                        
                            <div class="icon icon-success">
                                <img src="img/Empresa/art1.jpg" style="padding: 0px;" width="250" height="250" alt="..." class="img-thumbnail">
                            </div>
                            <h4 class="info-title">Primera  imagen</h4>
                            <p>Descripción sobre la imagen.</p>
                        
                    </div>
                    <div class="col-md-4">
                        
                            <div class="icon icon-success">
                                <img src="img/Empresa/art1.jpg" style="padding: 0px;" width="250" height="250" alt="..." class="img-thumbnail">
                            </div>
                            <h4 class="info-title">Segunda imagen</h4>
                            <p>Descripción sobre la imagen.</p>
                        
                    </div>
                    <div class="col-md-4">
                        
                        <div class="icon icon-success">
                            <img src="img/Empresa/art1.jpg" width="250" style="padding: 0px;" height="250" alt="..." class="img-thumbnail">
                        </div>
                        <h4 class="info-title">Tercera imagen</h4>
                        <p>Descripción sobre la imagen</p>
                    
                </div>
                </div>
            </div>
            <br>
        <!-- <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Contactános</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre:</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div> -->
    </div>


    <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aún no te has registrado?</h2>
                    <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
                    <form class="contact-form" method="get" action="{{ url('/register') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>

                        {{--<div class="form-group label-floating">--}}
                            {{--<label class="control-label">Tu mensaje</label>--}}
                            {{--<textarea class="form-control" rows="4"></textarea>--}}
                        {{--</div>--}}

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Iniciar registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
     
            <br>
		

</div>

@include('includes.footer')
@endsection
