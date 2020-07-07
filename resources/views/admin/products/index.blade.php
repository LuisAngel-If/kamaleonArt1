@extends('layouts.app')

@section('tittle', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>

            @if (session('notification'))
                <!-- <div class="alert alert-success">
                <i class="material-icons">check</i> 
                </div> -->

                <div class="alert alert-success">
                    <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="material-icons">check</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <b>Excelente!:</b> {{ session('notification') }}
                    </div>
                </div>
            @endif

            <div class="team">
                <div class="row">
                <a href="{{ url('/admin/products/create') }}" class="btn btn-primary"> <i class="material-icons">add_circle_outline</i> Nuevo Producto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-4 text-center">Descripción</th>
                            <th scope="col-md-4 text-center">FOTO </th>
                            <th class="text-center">Artista</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $product->id }}</td>
                            <!-- <td class="text-center" value="1">  {{ $loop->index }}</td> -->
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->descripcion }}</td>
                            <td> <img src="../img/{{ $product->imagen }}" width=70px></td>
                            <td> {{ $product->artist ? $product->artist->nameArt: 'General' }} </td>
                            <td class="text-right">$ {{ $product->precio }} </td>
                            <td class="td-actions text-right">
                               
                            <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                                <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
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
                {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')

@endsection
