@extends('layouts.app')

@section('tittle', 'Kamaleon Arte Decorativo| Dashboard')

@section('body-class', 'product-page')


@section('styles')
    <style>
        // Class
            .invisible {
            visibility: hidden;
            }
            .icon.icon-info {
                color: #b82c2c;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                background-color: #575c62;
                color: #FFFFFF;
                box-shadow: 0 16px 26px -10px rgba(156, 39, 176, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(156, 39, 176, 0.2);
            }

         
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('img/Empresa/Imagen3.jpg');">
   
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

            @if (session('status'))
                    <h3> {{ session('status') }}  </h3>     
                @endif
           
           
            <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#cart" role="tab" data-toggle="tab">
                    <i class="material-icons">add_shopping_cart</i>
                    Carrito
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="#orders" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i>
                    Pedidos
                </a>
            </li> -->

            @if(auth()->user()->admin)
            <li class="nav-item">
                <a class="nav-link" href="#messages" role="tab" data-toggle="tab">
                    <i class="material-icons">message</i>
                    Mensajes
                </a>
            </li>
            @endif
        </ul>


        <div class="tab-content tab-space">                  
            <!--Carrito -->
            
                <div class="tab-pane active" id="cart">
                    <!--@yield("content_dashboard_cart")-->
                    @if(auth()->user()->cart->details->count() > 0)
                    <hr>   
                    <p> Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos </p> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th class="col-md-4 ">Nombre</th>
                                <th class="col-md-2 ">Precio</th>
                                <th class="col-md-2 ">Cantidad</th>
                                <th class="col-md-2 ">Subtotal</th>
                                <th class="text-rigth">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $total = 0 ?> 
                        <!-- recorriendo cada item del carrito -->
                        @foreach(auth()->user()->cart->details as $detail)
                        <?php $total += $detail->product['precio'] * $detail['cantidad'] ?>
                        <tr>
                            <td class=""><img src="img/{{ $detail->product->imagen }}" height="50"></td>
                            <td> <a href="{{ url('/products/'.$detail->product->id) }}"></a>{{ $detail->product->name }}</td>
                            <td class="td-actions ">&dollar; {{ $detail->product->precio }} </td>
                            <td> {{ $detail->quantity }}</td>
                            <td> &dollar;{{ $detail->quantity* $detail->product->precio }}</td>
                            
                            <td class="td-actions col-md-4">
                                <!--/cart va hacia CartController-->
                                <form method="POST" action="{{ url('/cart') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                    <!-- <a href="{{ url('products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">info</i>
                                    </a>
                                    
                                    <button type="submit" rel="tooltip" title="Quitar del carrito" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                        <i class="fa fa-times"></i>
                                    </button> -->
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    
                                </form>
                            </td>
                        </tr>
                        <div class="invisible">{{ $total += $detail->quantity* $detail->product->precio }}</div>
                        @endforeach

                        
                        </tbody>
                        
                    </table>
                    <p><strong>Importe a pagar:</strong> {{ $total }}</p>
                    
                    <div class="invisible">Aqui no esta.</div>

           

                    <form class="pago" method="POST" id="payment-form" action="{!! URL::to('paypal/pay') !!}">    
                            
                        {{ csrf_field() }}
                        <input  type="hidden" id="total" type="text" name="total" value="{{$total}}">
                        <div class="paypal">
                            <div class="row justify-content-end">                
                                <button class="btn btn-success">Comprar</button>
                            </div> 
                        </div> 
                    </form>
                    @else
                    <div class="row">
                        <div class="col-md-12">  
                            <div class="info">
                                <div class="icon icon-info text-center">
                                    <i class="material-icons">warning</i>
                                </div>
                                <div class="text-center"><h2>Tu carrito de compras esta vacio, agrega productos para comprar</h2></div>
                            </div> 
                        </div>
                    </div>
                    @endif
                </div>
            <!--End Carrito -->

       
            <div class="tab-pane" id="orders">    
                @yield("content_dashboard_orders")

                @if(auth()->user()->order->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th>Status</th>
                            <th>Orden</th>
                            <th>Recibido</th>
                            <th class="col-md-2">Total</th>
                            <th class="text-rigth">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach(auth()->user()->order as $order)
                        <tr>
                            
                            <th>{{ $order->status }}</th>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->arrived_date }}</td>
                            <td class="td-actions ">&dollar; {{ $order->total }} </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" title="Detalles" class="btn btn-info btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#productsModal">
                                    <i class="material-icons">list</i>
                                </button>   
                    
                                @if(auth()->user()->admin)
                                    <button type="button" rel="tooltip" title="Cambiar status" class="btn btn-success btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#statusModal">
                                            <i class="material-icons">assignment</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Enviar mensaje" class="btn btn-light btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#messageModal">
                                            <i class="material-icons">reply</i>
                                    </button>
                                @endif  
                                <button type="submit" rel="tooltip" title="Cancelar pedido" class="btn btn-danger btn-fab btn-fab-mini btn-round"data-toggle="modal" data-target="#confirmModal">
                                    <i class="fa fa-times"></i>
                                </button> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-md-12">  
                        <div class="info">
                            <div class="icon icon-info text-center">
                                <i class="material-icons">info</i>
                            </div>
                            <div class="text-center"><h2>No hay pedidos aqui por ahora</h2></div>
                        </div> 
                    </div>
                </div>
                @endif
            </div>

            @if(auth()->user()->admin)
                <div class="tab-pane" id="messages">   
                

                    <div class="team">
                <div class="row">
       
                <table class="table">
                    <thead>
                        <tr>
                        <th class="text-center">Nombre</th>
                            <th class="text-center">Correo</th>
                            <th class="col-md-4 text-center">Mensaje</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    @foreach($mensajes as $mensaje)
                    <tbody>
                        <tr>
                         
                        <td class="text-center">{{ $mensaje->name }}</td>
                           
                        <td class="text-center"> {{ $mensaje->email }} </td>
                        <td class="text-justify"> {{ $mensaje->descripcion }} </td>
                          
                            <td class="td-actions text-right">
                               
                            <form method="post" action="{{ url('/home/'.$mensaje->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                           
                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>  
                             
                            </td>
                        </tr>
              
                    </tbody>
                    @endforeach
                </table>
                
              
                </div>
            </div>

                </div>
            @endif

            </div>
        </div>
    </div>
</div>


@include('includes.footer')


<!-- Modal Products -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="text-center modal-title " id="exampleModalLongTitle">Mostrando productos del pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th>Cantidad</th>   
                      </tr>
                  </thead>
                  <tbody>
                      @if(auth()->user()->orderDetails)
                          @foreach(auth()->user()->orderDetails->details as $detail)
                          <tr>
                              <td>{{ $detail->product->name }}</td>
                              <td>&dollar;{{ $detail->product->precio }}</td>
                              <td>{{ $detail->quantity }}</td>
                          </tr>
                          @endforeach
                      @endif

                  </tbody>
              </table>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal Menssage -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Enviar mensaje </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="contact-form" method="post" action="#">

                <div class="form-group">
                    <label class="bmd-label-floating">Asunto</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating" value="">Correo Electronico</label>
                    <input type="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
                    <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                </div>

                <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                    <button class="btn btn-primary btn-raised">
                    Enviar
                    </button>
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar estado del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/order/status') }}">
            {{ csrf_field() }}
            <label for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
                <option selected>Pendiente</option>
                <option>Aprobado</option>
                <option>Finalizado</option>
                <option>Cancelado</option>
            </select>
            <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confirm delete -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Esta seguro que desea eliminar este pedido?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ url('/order') }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection