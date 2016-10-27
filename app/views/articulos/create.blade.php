@extends('layouts.default')



@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/js/datepicker/datepicker.css" type="text/css" cache="false" />
<!-- <script src="/js/jquery.number.min.js"></script> -->
<script src="/js/accounting.min.js"></script>



<div class="row">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/articulos') }}"> Articulos</a>
		</div>
	</nav>

	<div class="col-sm-12">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Nuevo Articulos</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'articulos.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}
				<div class="row">
						<div class="col-xs-12">
							<label>Articulo</label>
							{{ Form::text('articulo', Input::get('articulo'), array('class' => 'form-control input-lg', 'id' =>'articulo', 'placeholder' => '')) }}
							@if ($errors->first('articulo'))
								<span class="label label-warning">{{ $errors->first('articulo') }}</span>
							@endif
						</div>
					</div>
					<br>
					<br><br><br>
				<div class="row">
					{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
				</div>
			</div>
		</section>
	</div>
</div>









<script src="/js/app.v2.js"></script>


<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>

@stop
