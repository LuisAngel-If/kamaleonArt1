@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   
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

                   

                    <br>
                    <button class="btn btn-success">Registrar</button>
                    <a href="{{ url('/admin/artists') }}" class="btn btn-default">Cancelar</a>

                   
                </form>

        </div>    
    </div>

</div>

@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
