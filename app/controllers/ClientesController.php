<?php

class ClientesController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $clientes = DB::table('clientes')
															->orderby('id', 'desc')
															->paginate(50);
        $title = "clientees";
        return View::make('clientes.index', array('title' => $title, 'clientes' => $clientes));
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


			$title = "Agregar cliente";

			return View::make('clientes.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// echo Input::get('clientes_id');
		// die;
		// $input = Input::all();

		// var_dump($input);
		// die;

		$rules = [
			'cliente' => 'required'
		];

		if (! Cliente::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Cliente::$errors);

		}

		$cliente = new Cliente;
		$cliente->cliente =  Input::get('cliente');
		$cliente->save();

		return Redirect::to('/clientes');

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$cliente = cliente::find($id);
		$title = "Editar cliente";

        return View::make('clientes.edit', array('title' => $title, 'cliente' => $cliente));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$rules = [
			'cliente' => 'required'

		];

		if (! Cliente::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Cliente::$errors);

		}


		$cliente = cliente::find($id);
		$cliente->cliente =  Input::get('cliente');
		$cliente->save();

		return Redirect::to('/clientes');



	}


		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{

			$cliente = Cliente::find($id)->delete();
			return Redirect::to('/clientes');


		}




}
