@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class')


@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">>
<div class="container">
				<div class="row">
	
            </div>
</div>
</div>




<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing" style="padding: 10px 0;"> 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title" style="margin-bottom: 10px;">Agradecimiento!</h2>
                    
                    <!-- <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5> -->
                </div>
            </div>  

                @if (session('status'))
                    <h3> {{ session('status') }}  </h3>     
                @endif
                
        
                <!-- <div class="text-center">
                    <form href="{{ url('/home') }}"  method="post" action="{{ url('/order') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success btn-round">
                            <i class="material-icons">assignment_return</i>Continuar

                        </button>
                    </form>
                </div> -->


        </div>
        <br>
    </div>
</div>

@include('includes.footer')
@endsection
