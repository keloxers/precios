<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// $password = Hash::make('Happy123:)');
// echo $password;
// die;




Route::get('/', ['as' => 'home', function () {
	return View::make('hello');
}]);


Route::get('profile', function() {
	return "Bienvenido " . Auth::user()->email;
})->before('auth');

Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');
Route::resource('sessions', 'SessionsController' , ['only' => ['index', 'create', 'destroy', 'store']]);
Route::resource('users', 'UsersController');



Route::get('/clientes/{id}/delete', 'ClientesController@destroy');
Route::resource('clientes', 'ClientesController');

Route::get('/articulos/{id}/delete', 'ArticulosController@destroy');
Route::resource('articulos', 'ArticulosController');




				Route::get('/api/clientes', function () {

						$clientes = DB::table('clientes')->get();

						//									->where('fecha', '>=', $fecha)
						//									->orderBy('fecha', 'asc')->paginate(3);

						$result  = array();
						foreach ($clientes as $cliente) {

									$result[] = array(

											"cliente" => $cliente->cliente,
											"clientes_id" => $cliente->id

									);
						};

						header('HTTP/1.1 200 OK');
						header('Content-type: text/html');

						echo json_encode($result);
						return;
				});


								Route::get('/api/articulos', function () {

										$articulos = DB::table('articulos')->get();

										//									->where('fecha', '>=', $fecha)
										//									->orderBy('fecha', 'asc')->paginate(3);

										$result  = array();
										foreach ($articulos as $articulo) {

													$result[] = array(

															"articulo" => $articulo->articulo,
															"articulos_id" => $articulo->id

													);
										};

										header('HTTP/1.1 200 OK');
										header('Content-type: text/html');

										echo json_encode($result);
										return;
								});


		Route::post('/api/precios', function () {

			// $cliente = $_POST['cliente'];
			// $articulo = $_POST['articulo'];
			// $precio = $_POST['precio'];
			try {

				header('HTTP/1.1 200 OK');
				header('Content-type: text/html');

				echo json_encode("ok1");
				return;


			}
			catch(PDOException $e)
			{
				echo $sql . "<br>" . $e->getMessage();

			}



		});
