@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar productos</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/products') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Dimensiones</label>
                            <input type="text" class="form-control" name="dimensiones" value="{{ old('dimensiones') }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Estilo</label>
                            <input type="text" class="form-control" name="estilo" value="{{ old('estilo') }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio') }}">
                        </div>
                    </div>
                

                    
                    <!-- <input class="datepicker form-control" type="text" value="03/12/2020"/> -->

                  
            
                    <!-- <div class="col-md-3">
                        <div class="form-group label-floating">
                        <input type="file" name="imagen" class="form-control-file" id="validatedCustomFile" required>
                          <button type="submit" class="btn btn-info">Seleccionar una imagen..</button>
                            
                            
                         </div>
                    </div> -->
                    <div class="col-sm-3">
                    
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">
                        </div>
                    </div>

                   
                    
                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Técnica</label>
                            <select class="form-control" name="technique_id">
                                <option value="0">Seleccionar...</option>
                                @foreach ($techniques as $technique)
                                <option value="{{ $technique->id }}">{{ $technique->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipos</label>
                            <select class="form-control" name="type_id">
                                <option value="0">Seleccionar...</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Género</label>
                            <select class="form-control" name="genre_id">
                                <option value="0">Seleccionar...</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Artista</label>
                            <select class="form-control" name="artist_id">
                                <option value="0">Seleccionar...</option>
                                @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->nameArt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleFormControlFile1">Imagen del producto</label>
                        <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen') }}">
                    </div>
                   
                    <div class="col-sm-11">
                         <textarea class="form-control" placeholder="Descripción" rows="5" name="descripcion">{{ old('descripcion') }}</textarea>
                    </div>
                   
                   
                    <button class="btn btn-success"><i class="material-icons">add</i>Registrar</button>
                    <a href="{{ url('/admin/products') }}" class="btn btn-danger"> <i class="material-icons">cancel</i>Cancelar</a>

                   
                </form>

        </div>    
    </div>

</div>

@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
