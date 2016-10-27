<?php

class ArticulosController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $articulos = DB::table('articulos')
															->orderby('id', 'desc')
															->paginate(50);
        $title = "Articulos";
        return View::make('articulos.index', array('title' => $title, 'articulos' => $articulos));
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


			$title = "Agregar Articulo";

			return View::make('articulos.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// echo Input::get('Articulos_id');
		// die;
		// $input = Input::all();
		//
		// var_dump($input);
		// die;

		$rules = [
			'articulo' => 'required'
		];

		if (! Articulo::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Articulo::$errors);
		}

		$articulo = new Articulo;
		$articulo->articulo =  Input::get('articulo');
		$articulo->save();

		return Redirect::to('/articulos');

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$articulo = Articulo::find($id);
		$title = "Editar Articulo";

        return View::make('articulos.edit', array('title' => $title, 'articulo' => $articulo));
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
			'articulo' => 'required'

		];

		if (! Articulo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Articulo::$errors);

		}


		$articulo = Articulo::find($id);
		$articulo->articulo =  Input::get('articulo');
		$articulo->save();

		return Redirect::to('/articulos');



	}


		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{

			$articulo = Articulo::find($id)->delete();
			return Redirect::to('/articulos');


		}




}
