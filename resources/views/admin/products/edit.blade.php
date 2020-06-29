@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   
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

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Dimensiones</label>
                            <input type="text" class="form-control" name="dimensiones" value="{{ old('dimensiones', $product->dimensiones) }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Estilo</label>
                            <input type="text" class="form-control" name="estilo" value="{{ old('estilo', $product->estilo) }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio', $product->precio) }}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $product->descripcion) }}">
                        </div>
                    </div>
                    <!-- <input class="datepicker form-control" type="text" value="03/12/2020"/> -->

                   
                    <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen', $product->imagen) }}">
                    <!-- <div class="col-md-3">
                        <div class="form-group label-floating">
                        <input type="file" name="imagen" class="form-control-file" id="validatedCustomFile" required>
                          <button type="submit" class="btn btn-info">Seleccionar una imagen..</button>
                            
                            
                         </div>
                    </div> -->
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ old('fecha', $product->fecha) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
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

                    <div class="col-sm-6">
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

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Género</label>
                            <select class="form-control" name="genres_id">
                                <option value="">Seleccionar..</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" @if($genre->id == old('genres_id', $product->genres_id)) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
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


                    <!-- <div class="col-md-3">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label"  data-date-format = "dd-mm-aaaa">Fecha</label>
                        <div class="col-10">
                           <input class="datepicker form-control" name="fecha" type="text"/>

                        </div>
                    </div>
                    </div> -->
                   

                    <br>
                    <button class="btn btn-success">Guardar cambios</button>
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
