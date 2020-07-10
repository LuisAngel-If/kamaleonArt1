@extends('layouts.app')

@section('tittle', 'Kamaleon Arte Decorativo| Dashboard')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Portada.jpg');">
   
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Bienvenido</h2>

                
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>
                <li>
                    <a href="#tasks" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
    		
            <hr>
           

        </div>

    </div>
</div>

@include('includes.footer')
@endsection