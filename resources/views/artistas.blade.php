@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class')

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
<div class="header header-filter" style="background-image: url('img/Empresa/Imagen2.1.jpg');">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</div>

<div class="main main-raised">
        <div class="section text-center">
            <h2 class="title">Artistas</h2>

            <div class="team">
                <div class="row text-center">
                @foreach ($artists as $artist)
                    <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                        
                        <div class="team-player">
                             <img src="img/{{ $artist->imagen }}" alt="Thumbnail Image" class="rounded img-raised img-circle">
                            <h4 class="title"> <a href="{{ url('/artists/'.$artist->id) }}"> {{ $artist->name }} </a><br>
                                
                            </h4>
                            
                            <!-- <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a> -->
                        </div>
                      
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $artists->links() }}
                </div>
            </div>
    </div>

</div>

@include('includes.footer')
@endsection
