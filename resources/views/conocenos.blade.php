@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class')


@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</div>




<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing" style="padding: 70px 0;"> 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title" style="margin-bottom: 10px;">Contáctanos</h2>
                    
                    
                    <!-- <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5> -->
                </div>
            </div>  

            @if ($errors->any())
            <div class="text-justify">
                    <div class="alert alert-danger">
                       
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                       
                    </div>
            </div>
            @endif

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
           
	        <div class="container">
	            <div class="row" id="modals">
	                <div class="col-md-6">
	                    <!-- <div class="title">
	                        <h3>Modal</h3>
                        </div> -->
                        
                        <div class="section landing-section" style="padding: 20px 0;">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="title">
                                        <h3 class="text-justify">Córdoba - Veracruz<div class="col-md-2" style="text-align:right"><span class="fa-stack fa-1x">
                                        <em class="fa fa-circle fa-stack-2x" style="color: #3d898f"></em>
                                        <em class="fa fa-stack-1x fa-map-marker" style="color: #fff"></em>
                                    </span></div></h3>
                                    </div> 
                                    <br>
                                    <div class="title">
                                        <h3 class="text-justify">kamaleonArt@gmail.com  <div class="col-md-2" style="text-align:right"><span class="fa-stack fa-1x">
                                        <em class="fa fa-circle fa-stack-2x" style="color: #3d898f"></em>
                                        <em class="fa fa-stack-1x fa-envelope" style="color: #fff"></em>
                                    </span></div></h3> 
                                    </div> 
                                    <br>
                                    <div class="title">
                                        <h3 class="text-justify">+ 271-000-00-00<div class="col-md-2" style="text-align:right"><span class="fa-stack fa-1x">
                                        <em class="fa fa-circle fa-stack-2x" style="color: #3d898f"></em>
                                        <em class="fa fa-stack-1x fa-phone" style="color: #fff"></em>
                                    </span></div></h3>
                                    </div>
                                  
                                </div>
                            </div>

	                     </div>

	                </div>
	                <div class="col-md-6">
						<!-- <div class="title">
	                        <h3>Popovers</h3>
	                    </div> -->
                        
                        <div class="section landing-section" style="padding: 20px 0;">
                            <div class="row">
                                <div class="col-md-15 col-md-offset-0">
                                    <!-- <h2 class="text-center title">Work with us</h2> -->
                                    <h4 class="text-center description">Comunicate y te contactaremos lo antes posible.</h4>
                                    <form class="contact-form" method="post" action="{{ url('/mensaje/nuevo') }}">
                                    {{ csrf_field() }}
                                        <div class="row text-justify">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombre</label>
                                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Correo</label>
                                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Mensaje</label>
                                            <textarea class="form-control" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4 text-center">
                                                <button class="btn btn-primary btn-raised" style="background-color: #3d898f;">
                                                    Enviar Mensaje
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
	                </div>
	                <br><br>  
				</div>
			</div>
		 
        </div>
    </div>
</div>

@include('includes.footer')
@endsection
