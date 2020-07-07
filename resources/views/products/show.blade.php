@extends('layouts.app')

@section('tittle', 'Kamaleon Arte Decorativo| Dashboard')

@section('body-class', 'profile-page')

@section('styles')
    <style>
       .rounded {
            height: 100px;
            width: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
            background:url("/img") center no-repeat;
            background-size:cover;
            }
    </style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('../img/Empresa/Portada.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="../img/{{ $product->imagen }}" alt="Thumbnail Image" class="img-rounded img-responsive-center">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $product->name }}</h3>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- <div class="container">
	            <div class="title">
	                <h2>Javascript components</h2>
	            </div>

	            <div class="row" id="modals">
	                <div class="col-md-6">
	                    <div class="title">
	                        <h3>Modal</h3>
	                    </div>

	                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	                      Launch demo modal
	                    </button>
	                </div>
	                <div class="col-md-6">
						<div class="title">
	                        <h3>Popovers</h3>
	                    </div>

	                    <button type="button" class="btn btn-default" data-toggle="popover" data-placement="left" title="" data-content="Here will be some very useful information about his popover.<br> Here will be some very useful information about his popover." data-container="body" data-original-title="Popover on left">On left</button>

						<button type="button" class="btn btn-default" data-toggle="popover" data-placement="top" title="" data-content="Here will be some very useful information about his popover." data-container="body" data-original-title="Popover on top">On top</button>

						<button type="button" class="btn btn-default" data-toggle="popover" data-placement="bottom" title="" data-content="Here will be some very useful information about his popover." data-container="body" data-original-title="Popover on bottom">On bottom</button>

	                    <button type="button" class="btn btn-default" data-toggle="popover" data-placement="right" title="" data-content="Here will be some very useful information about his popover." data-container="body" data-original-title="Popover on right">On right</button>

	                </div>
	                <br><br>

		            <div class="col-md-6">
		                <div class="title">
		                    <h3>Datepicker</h3>
		                </div>
		                <div class="row">
		                    <div class="col-md-6">
								<div class="form-group label-static">
									<label class="control-label">Datepicker</label>
									<input type="text" class="datepicker form-control" value="03/12/2016">
								<span class="material-input"></span></div>

		                    </div>
		                </div>
		            </div>

		            <div class="col-md-6">
						<div class="title">
							<h3>Tooltips</h3>
						</div>

						<button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="left" title="" data-container="body" data-original-title="Tooltip on left">On left</button>

						<button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="Tooltip on top">On top</button>

						<button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-container="body" data-original-title="Tooltip on bottom">On bottom</button>

						<button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip" data-placement="right" title="" data-container="body" data-original-title="Tooltip on right">On right</button>

		                <div class="clearfix"></div><br><br>
		            </div>

					<div class="title">
		                <h3>Carousel</h3>
		            </div>
				</div>
			</div> -->
		
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                          

                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="../img/{{ $product->imagen }}" class="img-rounded" />
                                        </div>
                                        <div class="card col-sm-4">
                                        <div class="description text-center" style="color:#000;">
                                            <p> Descripción: {{ $product->descripcion }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Artista: {{ $product->artist ? $product->artist->nameArt: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Técnica: {{ $product->technique ? $product->technique->name: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Género: {{ $product->genre ? $product->genre->name: 'General' }} </p>
                                        </div>
                                        <div class="description text-center" style="color:#000;">
                                            <p> Tipo de Obra: {{ $product->Type ? $product->Type->name: 'General' }} </p>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="text-center">
                                
                                    @if (auth()->check())
                                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                                            <i class="material-icons">add</i> Añadir al carrito de compras
                                        </button>
                                    @else
                                        <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
                                            <i class="material-icons">add</i> Añadir al carrito de compras
                                        </a>
                                    @endif
                                </div> 

                              
                            </div>
                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            

        </div>
    </div>
</div>

    
<!-- Button trigger modal -->


<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad</h4>
        <h4 class="modal-title" id="myModalLabel">Nota: Para las obras de Arte es solo una pieza</h4>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
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

