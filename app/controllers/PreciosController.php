<?php

class PreciosController extends BaseController {


	public function index()
	{
        $precios = DB::table('precios')
															->orderby('id', 'desc')
															->paginate(100);
        $title = "precios";
        return View::make('precios.index', array('title' => $title, 'precios' => $precios));
	}

	public function create()
	{


			$title = "Agregar precio";

			return View::make('precios.create', array('title' => $title));
	}

	public function store()
	{

		// echo Input::get('precios_id');
		// die;
		// $input = Input::all();

		// var_dump($input);
		// die;

		$rules = [
			'precio' => 'required'
		];

		if (! Precio::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Precio::$errors);

		}

		$precio = new Precio;
		$precio->precio =  Input::get('precio');
		$precio->save();

		return Redirect::to('/precios');

	}

	public function edit($id)
	{

		$precio = Precio::find($id);
		$title = "Editar precio";

        return View::make('precios.edit', array('title' => $title, 'precio' => $precio));
	}

	public function update($id)
	{

		$rules = [
			'precio' => 'required'

		];

		if (! Precio::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Precio::$errors);

		}

		$precio = Precio::find($id);
		$precio->precio =  Input::get('precio');
		$precio->save();

		return Redirect::to('/precios');

	}


		public function destroy($id)
		{

			$precio = precio::find($id)->delete();
			return Redirect::to('/precios');

		}

}
