@extends('layouts.default')

@section('content')

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<h1>Usuarios</h1>
	</div>
</nav>

<a href="{{ URL::to('/usuarios/create') }}" class="btn btn-s-md btn-primary">Nuevo Usuario</a>

	<?php


		if (count($usuarios)>0 )  {


?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Usuario</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>

											<?php

													foreach ($usuarios as $usuario)
														{

													// $cliente = cliente::find($juego->clientes_id);


													echo "<tr>";
															echo "<td>" . $usuario->usuario . "</td>";
															echo "<td>" ;
															echo "<a href='/usuarios/" . $usuario->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";
															echo "<a href='/usuarios/" . $usuario->id . "/delete' class='btn btn-xs btn-primary'>Eliminar</a> ";
															echo "</td>";
													echo "</tr>";


											}


										?>

									</tbody>
								</table>
							</div>
							<footer class="panel-footer">

								<div class="row">
									<div class="col-sm-4 hidden-xs">
										<!-- <select class="input-sm form-control input-s-sm inline">
											<option value="0">Bulk action</option>
											<option value="1">Delete selected</option>
											<option value="2">Bulk edit</option>
											<option value="3">Export</option>
										</select> -->
									</div>
									<div class="col-sm-4 text-center">
										<!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
									</div>
									<div class="col-sm-4 text-right text-center-xs">



									</div>
								</div>

							</footer>
						</section>
		<?php

			}

		?>
<script src="/js/app.v2.js"></script>
@stop
