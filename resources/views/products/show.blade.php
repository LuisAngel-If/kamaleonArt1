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
        .profile-page .gallery .profile-tabs{
           padding-bottom: 0px;
       
        }

        .profile-page .profile-tabs{
      
           margin-top: 0px
        }

        h2.title{
            margin-bottom: 0px;
        }




    </style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('../img/Empresa/Imagen11.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="../img/{{ $product->imagen }}" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                    </div>
                    <h2 class="title"> {{ $product->name }} - {{ $product->artist ? $product->artist->nameArt: 'General' }}</h2>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        

      
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row" style="margin-left: -150px; margin-right: -150px;">  
                                                 
                                            <img src="../img/{{ $product->imagen }}" class="img-rounded" style="width: 100%;">
                                        
                                    </div>
                                    <h2 class="title"> Información de la obra</h2>
                                </div>
                            </div>
                        </div>
                 
                </div>
            </div>
        <!-- <div class="team">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    
                    
                    <th scope="col">Last</th> 
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                    
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    
                    
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>

                </tbody>
            </table>
        </div>
        </div> -->
       

                    <div class="profile-tabs">
                        <div class="nav-align-center">
                          
                        
                            <div class="tab-content gallery">
                                
                                <div class="tab-pane active" id="studio">
                                
                                        
                                        <div class="description text-center" style="color:#000;">
                                            <p> Artista: {{ $product->artist ? $product->artist->name: 'General' }} {{ $product->artist ? $product->artist->Ap: 'General' }} {{ $product->artist ? $product->artist->Am: 'General' }} mejor conocido como: {{ $product->artist ? $product->artist->nameArt: 'General' }}  </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Técnica: {{ $product->technique ? $product->technique->name: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Género: {{ $product->genre ? $product->genre->name: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Tipo de Obra: {{ $product->type ? $product->type->name: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Dimensiones: {{ $product->dimensiones }}  </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Estilo: {{ $product->estilo }}  </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Fecha de creación: {{ $product->fecha }}  </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Precio en MXN: {{ $product->precio }}  </p>
                                        </div>
                                        <div class="text-center">
                                            <div class="panel-body">
                                            <div class="col-md-6 col-md-offset-3">
                                                Descripción: {{ $product->descripcion }}
                                             </div>
                                            </div>
                                        </div>
                                       
                                </div>
                                    
                            </div>
         
                        
                     
                                <div class="text-center">
                                
                                    @if (auth()->check())
                                        <button class="btn btn-primary btn-round" style="background-color: #3d898f;" data-toggle="modal" data-target="#modalAddToCart">
                                            <i class="material-icons">add</i> Añadir al carrito de compras
                                        </button>
                                    @else
                                        <a href="{{ url('/login?redirect_to='.url()->current()) }}" style="background-color: #3d898f;" class="btn btn-primary btn-round">
                                            <i class="material-icons">add</i> Añadir al carrito de compras
                                        </a>
                                    @endif
                                </div> 

                              
                            </div>
                        </div>
                    </div>
                    <!-- End Profile Tabs -->
              
            <br>

    
                 
</div>

    
<!-- Button trigger modal -->


<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad</h4>
        <h4 class="modal-title" id="myModalLabel">Nota: Para las obras de Arte es solo una pieza</h4>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form>
    </div>
  </div>
</div>         

@include('includes.footer')

<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection

