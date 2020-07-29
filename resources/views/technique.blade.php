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
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('../img/Empresa/Portada.jpg');">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="col-md-2">
        <div class="card">
        
        </div>
        </div>
   

        <div class="section text-center">
        @foreach ($products as $key => $product)
            @if($key < 1)
            <h2 class="title">Productos disponibles de la técnica: {{ $product->technique ? $product->technique->name: 'General' }}</h2>
            @endif
        @endforeach
                <form class="form-inline" method="get" action="{{ url('/search') }}">
                    <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                    <button class="btn btn-primary btn-just-icon" type="submit">
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
                                <small class="text-muted"> {{ $product->artist ? $product->artist->name: 'General' }} </small>
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
