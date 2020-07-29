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
            .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        .tt-hint {
          color: #999
        }
        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }
        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }
        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;
        }
        .tt-suggestion p {
          margin: 0;
        }


        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
        background-color: #575c62;
        border-color: #575c62;
        color: #FFFFFF;
        box-shadow: 0 4px 5px 0 rgba(156, 39, 176, 0.14), 0 1px 10px 0 rgba(156, 39, 176, 0.12), 0 2px 4px -1px rgba(156, 39, 176, 0.2);
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Imagen11.jpg');">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</div>

<div class="main main-raised">
<nav class="navbar  navbar-absolute" style="background-color: #575c62;"<>
	
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header">
    
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
        
            
        
        <a class="navbar-brand">
         Puedes buscar por:
        </a>
        </div>
        

        <div class="collapse navbar-collapse" id="navigation-example">
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre="">
                    Géneros <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                @foreach($genres as $genre)
                    <li>
                        <a href="{{ url('/genre/'.$genre->id) }}" target="-blank">{{ $genre->name }}</a>
                    </li>
                @endforeach 
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre="">
                    Artistas <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                @foreach($artistas as $artista)
                    <li>
                        <a href="{{ url('/artistass/'.$artista->id) }}" target="-blank">{{ $artista->name }}</a>
                    </li>
                @endforeach 
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre="">
                    Técnicas <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                @foreach($techniques as $technique)
                    <li>
                        <a href="{{ url('/technique/'.$technique->id) }}" target="-blank">{{ $technique->name }}</a>
                    </li>
                @endforeach 
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre="">
                    Tipo de obra <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                @foreach($types as $type)
                    <li>
                        <a href="{{ url('/type/'.$type->id) }}" target="-blank">{{ $type->name }}</a>
                    </li>
                @endforeach 
                </ul>
            </li>
           
                    
                                        <!-- <li>
                    <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
   

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

                <form class="form-inline" method="get" action="{{ url('/search') }}">
                    <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                    <button class="btn btn-primary btn-just-icon" type="submit" style="background-color: #575c62;">
                        <i class="material-icons">search</i>
                    </button>
                </form>

            <div class="team">
                <div class="row">
                @foreach ($products as $product)
                    <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                        
                        <div class="team-player">
                            <img src="img/{{ $product->imagen }}" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                            <h4 class="title"> <a href="{{ url('/products/'.$product->id) }}"> {{ $product->name }} </a><br>
                                <small class="text-muted"> {{ $product->genre ? $product->genre->name: 'General' }} </small>
                            </h4>
                            <h4 class="title">
                                <small class="text-muted"> ${{ $product->precio }} </small>
                            </h4>
                     
                            <!-- <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a> -->
                        </div>
                      
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                <ul class="pagination pagination-primary">
                    {{ $products->links() }}
                </ul>
                </div>
            </div>    
        </div>
         
    

</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function(){
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
             // local: ['hola', 'prueba1', 'prueba2', 'holaje']
              prefetch: '{{ url("/products/json") }}'
            });     
            //typeahed para input de búsqueda   
            $('#search').typeahead({
                hint: true,
                highlight: true,
                cache: false,
                minLength: 1
            },{
                name: 'products',
                source: products
            });
        });
    </script>
@endsection
