<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Maquina;
use App\User;
use App\Espacio;
use Session;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		if(Auth::user()->isSuperAdmin()) {
			$maquinas = Maquina::orderBy('id', 'desc')->paginate(10);
		}elseif (Auth::user()->isAdmin()){
			$maquinas = Auth::user()->maquinas()->paginate(10);
		}else{
			redirect()->route('index');
		}
		return view('espacio.index')->withMaquinas($maquinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		if(Auth::user()->isSuperAdmin()) {
			$maquinas = Maquina::all();
			$users=User::all();
		}else{
			$maquinas=Auth::user()->maquinas;
			$users=Auth::user()->users;
		}
		$my_users=array();
		$my_maquinas=array();
		foreach ($users as $user){
			$my_users[$user->id]=$user->name;
		}
		foreach ($maquinas as $maquina){
			$my_maquinas[$maquina->id]=$maquina->name;
		}
		return view('espacio.create')->withMaquinas($my_maquinas)->withUsers($my_users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request,array(
			'maquina_id'=>'integer',
			'user_id'=>'integer',
			'inicio'=>'date',
			'periodos'=>'integer|max:100',

		));

		$espacio=new Espacio();
		$espacio->maquina_id=$request->maquina_id;
		$espacio->user_id=$request->user_id;
		$espacio->inicio=date('Y-m-j', strtotime($request->inicio));
		$espacio->periodos=$request->periodos;
		$espacio->save();
		Session::flash('success','Espacio Asignado con Éxito');
		return redirect()->route('espacios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Auth::user()->isSuperAdmin()) {
			$maquinas = Maquina::all();
			$users=User::all();
		}else{
			$maquinas=Auth::user()->maquinas;
			$users=Auth::user()->users;
		}
		$my_users=array();
		$my_maquinas=array();
		foreach ($users as $user){
			$my_users[$user->id]=$user->name;
		}
		foreach ($maquinas as $maquina){
			$my_maquinas[$maquina->id]=$maquina->name;
		}
		$espacio=Espacio::find($id);
		return view('espacio.edit')->withEspacio($espacio)->withMaquinas($my_maquinas)->withUsers($my_users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$this->validate($request,array(
			'maquina_id'=>'integer',
			'user_id'=>'integer',
			'inicio'=>'date',
			'periodos'=>'integer|max:100',

		));
		$espacio= Espacio::find($id);
		$espacio->maquina_id=$request->input('maquina_id');
		$espacio->user_id=$request->input('user_id');
		$espacio->periodos=$request->input('periodos');
		$espacio->inicio=date('Y-m-j', strtotime($request->input('inicio')));

		$espacio->save();


		Session::flash('success','Espacio modificado');
		return redirect()->route('espacios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$espacio=Espacio::find($id);
		$espacio->delete();
		Session::flash('success','Espacio Eliminado' );
		return redirect()->route('espacios.index');
    }
}
