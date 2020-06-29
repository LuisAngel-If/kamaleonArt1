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
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</div>

<div class="main main-raised">
    
<div class="col-md-2">
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Full header coloured</h4>
            <p class="category">Category subtitle</p>
        </div>
        <div class="card-body">
              The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
        </div>
    </div>
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Full header coloured</h4>
            <p class="category">Category subtitle</p>
        </div>
        <div class="card-body">
              The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
        </div>
    </div>
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Full header coloured</h4>
            <p class="category">Category subtitle</p>
        </div>
        <div class="card-body">
              The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
        </div>
    </div>
</div> 

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

            <div class="team">
                <div class="row">
                @foreach ($products as $product)
                    <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                        
                        <div class="team-player">
                            <img src="img/{{ $product->imagen }}" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                            <h4 class="title"> <a href="{{ url('/products/'.$product->id) }}"> {{ $product->name }} </a><br>
                                <small class="text-muted"> {{ $product->artist ? $product->artist->nameArt: 'General' }} </small>
                            </h4>
                            <p class="description"> {{ $product->descripcion }} </p>
                            <!-- <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a> -->
                        </div>
                      
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->links() }}
                </div>
            </div>

        </div>


       
    </div>

</div>

@include('includes.footer')
@endsection
