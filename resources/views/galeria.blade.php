@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class')



@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Imagen1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
           
            
            </div>
        </div>
    </div>
</div>

<div class="main main-raised" style="background-color: white;">
    <div class="container">
        <div class="section text-center section-landing" style="padding: 26px 0;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title" style="margin-bottom: 10px;">Galería</h2>
                </div>
				<div class="card card-raised card-carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel slide" data-ride="carousel">

								
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
										<li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
									</ol>

									
									<div class="carousel-inner">
										<div class="item">
											<img src="img/Empresa/Imagen2.1.jpg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">palette</i> Julián Miguel Salas - Efímero Abril</h4>
											</div>
										</div>
										<div class="item active">
											<img src="img/Empresa/Imagen2.1.jpg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">palette</i> Julián Miguel Salas - Efímero Abril</h4>
											</div>
										</div>
										<div class="item">
											<img src="img/Empresa/Portada.jpg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">palette</i> Julián Miguel Salas - Efímero Abril</h4>
											</div>
										</div>
									</div>

									
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<i class="material-icons">keyboard_arrow_left</i>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								</div>
							</div>
         				</div>            
       				</div>
           			 <br>
						<br>
						<br>
				</div>
			
		</div>
		

</div>

@include('includes.footer')
@endsection
