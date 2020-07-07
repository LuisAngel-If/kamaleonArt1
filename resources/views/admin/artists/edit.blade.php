@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Editar Artista</h2>

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/artists/'.$artist->id.'/edit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Artista</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $artist->name) }}">
                        </div>
                    </div>   

                     <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Paterno del Artista</label>
                            <input type="text" class="form-control" name="Ap" value="{{ old('Ap', $artist->Ap) }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Apellido Paterno del Artista</label>
                            <input type="text" class="form-control" name="Am" value="{{ old('Am', $artist->Am) }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Artístico del Artista</label>
                            <input type="text" class="form-control" name="nameArt" value="{{ old('nameArt', $artist->nameArt) }}">
                        </div>
                    </div>          
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">URL Facebook</label>
                            <input type="text" class="form-control" name="urlFa" value="{{ old('urlFa', $artist->urlFa) }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <label for="exampleFormControlFile1">Imagen de Perfil</label>
                        <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen', $artist->imagen) }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleFormControlFile1">Imagen de Portada</label>
                        <input type="file" name="imagenAlu" class="form-control-file" value="{{ old('imagenAlu', $artist->imagenAlu) }}">
                    </div>
                   
                   
                   
                    <div class="form-group">
                         <textarea class="form-control" placeholder="Descripción" rows="5" name="descripcion">{{ old('descripcion', $artist->descripcion) }}</textarea>
                    </div>
                    <button class="btn btn-success"><i class="material-icons">save</i> Guardar cambios</button>
                    <a href="{{ url('/admin/artists') }}" class="btn btn-danger"> <i class="material-icons">cancel</i>  Cancelar</a>
                   
                </form>

        </div>    
    </div>

</div>
@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
