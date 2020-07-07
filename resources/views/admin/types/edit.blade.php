@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Editar Tipo de Obra seleccionado</h2>

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/types/'.$type->id.'/edit') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la Técnica</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $type->name) }}">
                        </div>
                    </div>             
                    <br>
                    <button class="btn btn-success">Guardar cambios</button>
                    <a href="{{ url('/admin/types') }}" class="btn btn-danger"> <i class="material-icons">close</i>  Cancelar</a>
                   
                </form>

        </div>    
    </div>

</div>
@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
