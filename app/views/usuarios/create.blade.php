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
			<a class="navbar-brand" href="{{ URL::to('/usuarios') }}"> Usuarios</a>
		</div>
	</nav>

	<div class="col-sm-12">
		<section class="panel panel-default">
			<header class="panel-heading font-bold">Nuevo Usuario</header>
			<div class="panel-body">
				{{ Form::open(array('route' => 'usuarios.store', "autocomplete"=>"off", 'class' => 'panel-body wrapper-lg')) }}


				<div class="row">

					<div class="form-group">
						<label class="control-label">Usuario</label>
						{{ Form::text('usuario', '', array('class' => 'form-control input-lg', 'id' => 'usuario', 'placeholder' => '')) }}<br>
						{{ $errors->first('usuario') }}
						</div>
					<div class="form-group">
						<label class="control-label">Clave</label>
						{{ Form::password('clave' ,array('class' => 'form-control input-lg', 'id' => 'clave', 'placeholder' => '')) }}<br>
						{{ $errors->first('clave') }}
					</div>


				<div class="row">
					{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
				</div>



			</div>
			</div>
		</section>

</div>









<script src="/js/app.v2.js"></script>


<script src="/js/datepicker/bootstrap-datepicker.js" cache="false"></script>

@stop
