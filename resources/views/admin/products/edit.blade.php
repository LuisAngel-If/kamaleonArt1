@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Imagen11.jpg') }}');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Editar producto</h2>

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/products/'.$product->id.'/edit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Dimensiones</label>
                            <input type="text" class="form-control" name="dimensiones" value="{{ old('dimensiones', $product->dimensiones) }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Estilo</label>
                            <input type="text" class="form-control" name="estilo" value="{{ old('estilo', $product->estilo) }}">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio', $product->precio) }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ old('fecha', $product->fecha) }}">
                        </div>
                    </div>

               

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Técnica</label>
                            <select class="form-control" name="technique_id">
                                <option value="">Seleccionar..</option>
                                @foreach ($techniques as $technique)
                                <option value="{{ $technique->id }}" @if($technique->id == old('technique_id', $product->technique_id)) selected @endif>{{ $technique->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipos</label>
                            <select class="form-control" name="type_id">
                                <option value="">Seleccionar..</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}" @if($type->id == old('type_id', $product->type_id)) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Género</label>
                            <select class="form-control" name="genre_id">
                                <option value="">Seleccionar..</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" @if($genre->id == old('genre_id', $product->genre_id)) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Artista</label>
                            <select class="form-control" name="artist_id">
                                <option value="">Seleccionar..</option>
                                @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}" @if($artist->id == old('artist_id', $product->artist_id)) selected @endif>{{ $artist->nameArt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <!-- <input class="datepicker form-control" type="text" value="03/12/2020"/> -->

                 
                    <div class="col-sm-3">
                        <label for="exampleFormControlFile1">Imagen del producto</label>
                        <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen', $product->imagen) }}">
                     </div>
                     <div class="col-sm-11">      
                        <textarea type="text" placeholder="Descripción" rows="5" class="form-control" name="descripcion">{{ old('descripcion', $product->descripcion) }}</textarea>
                     </div>
                    <!-- <div class="col-md-3">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label"  data-date-format = "dd-mm-aaaa">Fecha</label>
                        <div class="col-10">
                           <input class="datepicker form-control" name="fecha" type="text"/>

                        </div>
                    </div>
                    </div> -->
                   

                    <br>
                    <button class="btn btn-success"><i class="material-icons">save</i>Guardar cambios</button>
                    <a href="{{ url('/admin/products') }}" class="btn btn-danger"> <i class="material-icons">close</i>  Cancelar</a>
                   
                </form>

        </div>    
    </div>

</div>
@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
