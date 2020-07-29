@extends('layouts.app')

@section('tittle', 'Listado de Artistas')

@section('body-class', 'product-page')

@section('styles')
    <style>
        .team {
            margin-top: 0px; 
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
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Artistas</h2>

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
                <a href="{{ url('/admin/artists/create') }}" class="btn btn-primary" style="background-color: #575c62;"> <i class="material-icons">add_circle_outline</i> Nuevo Tipos de Obras</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-2 text-center">Apellido Paterno</th>
                            <!-- <th class="col-md-2 text-center">Nombre Artístico</th> -->

                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    @foreach($artists as $key => $artist)
                    <tbody>
                        <tr>
                            <td class="text-center">{{ ($key+1) }}</td>
                            <!-- <td class="text-center" value="1">  {{ $loop->index }}</td> -->
                            <td>{{ $artist->name }}</td>
                            <td>{{ $artist->Ap }}</td>
                            <!-- <td> {{ $artist->artist ? $product->artist->nameArt: 'General' }} </td> -->
                            <td class="td-actions text-right">
                               
                            <form method="post" action="{{ url('/admin/artists/'.$artist->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                
                                <a href="{{ url('/artists/'.$artist->id) }}" rel="tooltip" title="Ver Artista" class="btn btn-info btn-simple btn-xs" target="_blank">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a href="{{ url('/admin/artists/'.$artist->id.'/edit') }}" rel="tooltip" title="Editar Artista" class="btn btn-success btn-simple btn-xs">
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
                {{ $artists->links() }}
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')

@endsection
