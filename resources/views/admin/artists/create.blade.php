@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar Artista</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/artists') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Artista</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Paterno del Artista</label>
                            <input type="text" class="form-control" name="Ap" value="{{ old('Ap') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Paterno del Artista</label>
                            <input type="text" class="form-control" name="Am" value="{{ old('Am') }}">
                        </div>
                    </div>
                   
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Artístico del Artista</label>
                            <input type="text" class="form-control" name="nameArt" value="{{ old('nameArt') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">URL Facebook</label>
                            <input type="text" class="form-control" name="urlFa" value="{{ old('urlFa') }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <label for="exampleFormControlFile1">Imagen de perfil</label>
                        <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen') }}">
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleFormControlFile1">Imagen de Portada</label>
                        <input type="file" name="imagenAlu" class="form-control-file" value="{{ old('imagenAlu') }}">
                    </div>
                   
                   
                   
                    <div class="col-sm-11">
                         <textarea class="form-control" placeholder="Descripción" rows="5" name="descripcion">{{ old('descripcion') }}</textarea>
                    </div>
                    <!-- <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                        </div>
                    </div> -->

                    
                    <button class="btn btn-success"><i class="material-icons">add</i> Registrar</button>
                    <a href="{{ url('/admin/artists') }}" class="btn btn-danger"><i class="material-icons">cancel</i> Cancelar</a>                  
                </form>

        </div>    
    </div>

</div>

@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
