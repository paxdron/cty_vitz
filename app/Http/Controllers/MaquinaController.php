<?php

namespace App\Http\Controllers;

use App\Maquina;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
class MaquinaController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');

	}
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
		return view('maquina.index')->withMaquinas($maquinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('maquina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$this->validate($request,array(
			'name'=>'required|alpha_dash|max:128',
			'ip'=>'required|ip|max:45|unique:maquinas,ip',
		));

		$maquina=new Maquina();
		$maquina->name=$request->name;
		$maquina->ip=$request->ip;

		$maquina->save();
		Session::flash('success','La Máquina '.$maquina->name.' fue creada');
		return redirect()->route('maquinas.show',$maquina->id);

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
		$maquina=Maquina::find($id);
		return view('maquina.show')->withMaquina($maquina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$maquina=Maquina::find($id);
		$users=User::where('type',1)->get();
		$admins=array();
		foreach ($users as $user){
			$admins[$user->id]=$user->name;
		}
		return view('maquina.edit')->withMaquina($maquina)->withAdmins($admins);
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

        //
		$maquina=Maquina::find($id);
		if($request->input('ip')==$maquina->ip){
			$this->validate($request,array(
				'name'=>'required|alpha_dash|max:128',
			));
		}else{
			$this->validate($request,array(
				'name'=>'required|alpha_dash|max:128',
				'ip'=>'required|ip|max:45|unique:maquinas,ip',
			));
		}


		$maquina= Maquina::find($id);
		$maquina->name=$request->input('name');
		$maquina->ip=$request->input('ip');

		$maquina->save();

		if(isset($request->admins)) {
			$maquina->users()->sync($request->admins);
		}else{
			$maquina->users()->sync(array());
		}
		Session::flash('success','Máquina '.$maquina->name.' modificada');
		return redirect()->route('maquinas.show',$maquina->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$maquina=Maquina::find($id);
		$maquina->delete();
		Session::flash('success','Máquina '.$maquina->name.' Eliminada' );
		return redirect()->route('maquinas.index');
        //
    }
}
