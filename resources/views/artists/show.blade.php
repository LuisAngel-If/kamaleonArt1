@extends('layouts.app')

@section('tittle', 'Kamaleon Arte Decorativo| Dashboard')

@section('body-class', 'profile-page')

@section('styles')
    <style>
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

<div class="header header-filter" style="background-image: url('../img/Empresa/Portada.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                  
                    <!-- <div class="name">
                        <h3 class="title">{{ $artist->name }}</h3>
                    </div> -->
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
		
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row" style="margin-left: -150px; margin-right: -150px;">  
                                                 
                                            <img src="../img/{{ $artist->imagenAlu }}" class="img-rounded" style="width: 100%;">
                                        
                                    </div>
                                    <p>{{ $artist->name }} {{ $artist->Ap }} {{ $artist->Am }} mejor conocido como: {{ $artist->nameArt }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
	            <div class="row" id="modals">
	                <div class="col-md-3">
	                    <!-- <div class="title">
	                        <h3>Modal</h3>
                        </div> -->
                        
                        <div class="section landing-section" style="padding: 19px 0;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="title">
                                         <img src="../img/{{ $artist->imagen }}" width="200" height="200" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                                    </div>
                                 
                
                                    <div id="redesFooterIft">
                                            <a href="{{ url($artist->urlFa) }}" target="_blank" class="btnTransparentFooter" style="color:#1e6172;">
                                                <span class="fa-stack fa-2x">
                                                    <em class="fa fa-circle fa-stack-2x iconGrayColor"></em>
                                                    <em id="facebook" class="fa fa-stack-1x fa-facebook" style="color: #ffffff"></em>
                                                </span>
                                            </a>
                                            <a href="{{ $artist->urlFa }}" target="_blank" class="btnTransparentFooter" style="color:#1e6172;">
                                                <span class="fa-stack fa-2x">
                                                    <em class="fa fa-circle fa-stack-2x iconGrayColor"></em>
                                                    <em id="facebook" class="fa fa-stack-1x fa-facebook" style="color: #ffffff"></em>
                                                </span>
                                            </a>
								        </div>
                                  
                                </div>
                            </div>

	                     </div>

	                </div>
	                <div class="col-md-9">
						<!-- <div class="title">
	                        <h3>Popovers</h3>
	                    </div> -->
                        
                        <div class="section landing-section" style="padding: 20px 0;">
                            <div class="row">
                                <div class="col-md-15 col-md-offset-0">
                                    <!-- <h2 class="text-center title">Work with us</h2> -->
                                    <p class="text-justify">{{ $artist->descripcion }}</p>
                                    <form class="contact-form">
                                        <div class="row text-justify">
                                            

                                        
                                    </form>
                                </div>
                            </div>

                        </div>
                        </div>
	                </div>
	                <br><br>  
				</div>
			</div>
    </div>
</div>


    
<!-- Button trigger modal -->


@include('includes.footer')

<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection

