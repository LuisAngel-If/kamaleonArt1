@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/Empresa/Portada.jpg') }}'););">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar Tipo de Obra</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form class="form-horizontal" method="POST" action="{{ url('/admin/types') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 

                    <div class="col-md-3 col-md-offset-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Tipo de Obra </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"> 
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                    <button class="btn btn-success"><i class="material-icons">add</i> Registrar</button>
                    <a href="{{ url('/admin/types') }}" class="btn btn-danger"><i class="material-icons">cancel</i> Cancelar</a>
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
