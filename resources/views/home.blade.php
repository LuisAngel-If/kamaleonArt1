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
           
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">shopping_cart</i>
                        Carrito de compras
                    </a>
                
              
                 
           
            <hr>
            <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos agregados</p>
            <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Nombre</th>
                           
                        
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    @foreach (auth()->user()->cart->details as $detail)
                    <tbody>
                        <tr>
                        <td class="text-center">
                            <img src="img/{{ $detail->product->imagen }}" height="50">
                        </td>
                        <td>
                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                        </td>
                            
                        
                            <td>$ {{ $detail->product->precio }} </td>
                            <td>{{ $detail->quantity }}</td>
                            <td>$ {{ $detail->quantity * $detail->product->precio }}</td>
                            <td class="td-actions">
                               
                                <form method="post" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                             
                            </td>
                        </tr>
                   @endforeach
                    </tbody>
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