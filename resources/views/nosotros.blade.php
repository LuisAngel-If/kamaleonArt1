@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class')


@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">>
<div class="container">
				<div class="row">
					<!-- <div class="col-md-8 col-md-offset-2">

					
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
											<img src="img/Empresa/Portada.jpg" class="d-block w-100" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
											</div>
										</div>
										<div class="item active">
											<img src="img/Empresa/Portada.jpg" class="d-block w-100" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Somewhere Beyond, United States</h4>
											</div>
										</div>
										<div class="item">
											<img src="img/Empresa/Portada.jpg" class="d-block w-100" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
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
				</div> -->
            </div>
</div>
</div>




<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing" style="padding: 10px 0;"> 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title" style="margin-bottom: 10px;">Nosotros</h2>
                    
                    <!-- <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5> -->
                </div>
            </div>  
               
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                     <img src="img/icon/objetivo.png" width="80" height="80" alt="">
                                </div>
                                <h4 class="info-title">Objetivo</h4>
                                <p class="text-justify">Crear un mercado de exhibición y venta, así como seguir siendo un suplemento educativo que ayuda al desarrollo de psicomotricidad y de creatividad.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <img src="img/icon/mision.png" width="80" height="80" alt="">
                                </div>
                                <h4 class="info-title">Misión</h4>
                                <p class="text-justify">Kamaleon Arte Decorativo es una empresa que busca dar a conocer la obra de distintos artistas para seguir fomentando el aprendizaje y la exhibición.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                     <img src="img/icon/vision.png" width="80" height="80" alt="">
                                </div>
                                <h4 class="info-title">Visión</h4>
                                <p class="text-justify">Crear un mercado de arte en la ciudad de Córdoba, Veracruz</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title" style="margin-bottom: 10px;">¿Quiénes somos?</h2>
                            
                            <!-- <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5> -->
                            <div class="row">
                                <div class="col-md-15 col-md-offset-1">
                                    
                                    <h5 class="description text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
                                </div>
                            </div>

                        </div>
                    </div> 
                </div>
            <br>
        </div>
    </div>

@include('includes.footer')
@endsection
