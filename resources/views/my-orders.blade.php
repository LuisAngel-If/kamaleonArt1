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
           
           
             
                    <a href="{{ url('/home') }}" class="btn btn-danger">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
              
             
                    <a href="{{ url('/my-orders') }}" class="btn btn-danger" >
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
            
     
                 
           
            <hr>
            <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos agregados</p>
            <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha de Pedido</th>
                            <th class="text-center">Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                </table>

                <p><strong>Importe a pagar: </strong>{{ auth()->user()->cart->total }}</p>
                <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                    
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
                
            </div>

        </div>

    </div>
</div>

@include('includes.footer')
@endsection