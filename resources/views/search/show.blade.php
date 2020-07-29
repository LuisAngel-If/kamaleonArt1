@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('body-class', 'profile-page')

@section('styles')
    <style>
        .team {
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Imagen11.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="img/icon/lupaa.png"  alt="Imagen de una lupa que representa a la página de resultados" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title">Resultados de búsqueda</h3>
                    </div>

                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>Se encontraron {{ $products->count() }} resultados para el término {{ $query }}.</p>
            </div>

            <div class="team text-center">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">
                        <img src="img/{{ $product->imagen }}" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                            <h4 class="title"> <a href="{{ url('/products/'.$product->id) }}"> {{ $product->name }} </a><br>
                                <small class="text-muted"> {{ $product->artist ? $product->artist->nameArt: 'General' }} </small>
                            </h4>
                            <h4 class="title">
                                <small class="text-muted"> ${{ $product->precio }} </small>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
              
            </div>

        </div>
    </div>
</div> 

@include('includes.footer')
@endsection