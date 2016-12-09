<?php

class UsuariosController extends BaseController {

	public function index()
	{

        $usuarios = DB::table('usuarios')
															->orderby('id', 'desc')
															->paginate(50);
        $title = "Usuarios";
        return View::make('usuarios.index', array('title' => $title, 'usuarios' => $usuarios));
	}

	public function create()
	{
			$title = "Agregar Usuario";
			return View::make('usuarios.create', array('title' => $title));
	}

	public function store()
	{

		$rules = [
			'usuario' => 'required',
			'clave' => 'required'
		];

		if (! Usuario::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Usuario::$errors);

		}

		$usuario = new Usuario;
		$usuario->usuario =  Input::get('usuario');
		$usuario->clave =  Input::get('clave');
		$usuario->save();

		return Redirect::to('/usuarios');

	}

	public function edit($id)
	{

		$usuario = Usuario::find($id);
		$title = "Editar Usuario";

        return View::make('usuarios.edit', array('title' => $title, 'usuario' => $usuario));
	}

	public function update($id)
	{

		$rules = [
			'usuario' => 'required',
			'clave' => 'required'

		];

		if (! Usuario::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Usuario::$errors);

		}

		$usuario = Usuario::find($id);
		$usuario->usuario =  Input::get('usuario');
		$usuario->clave =  Input::get('clave');
		$usuario->save();

		return Redirect::to('/usuarios');

	}

		public function destroy($id)
		{
			$usuario = Usuario::find($id)->delete();
			return Redirect::to('/usuarios');
		}

}
