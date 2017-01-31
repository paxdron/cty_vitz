<?php

namespace App\Http\Controllers;

use App\Espacio;
use App\Publicidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PublicidadController extends Controller
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
		$publicidads = Auth::user()->publicidads()->paginate(10);


		return view('publicidad.index')->withPublicidads($publicidads);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$espacios=Auth::user()->espacios;
		$mis_espacios=array();
		foreach ($espacios as $espacio){
			$mis_espacios[$espacio->id]=$espacio->maquina->name.'('.count($espacio->publicidads).')';
		}
		return view('publicidad.create')->withEspacios($mis_espacios);
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
			'name'=>'required|alpha_dash|max:128',
		));

		$publicidad= new Publicidad();
		$publicidad->name=$request->input('name');
		$publicidad->user_id=Auth::user()->id;

		if($request->hasFile('name_file')){
			$video = $request->file('name_file');
			$filename=time().'.'.$video->getClientOriginalExtension();
			$location=storage_path('app\publicidad');
			$publicidad->name_file=$filename;
			$video->move($location, $filename);
		}


		$publicidad->save();

		if(isset($request->espacios)) {
			$publicidad->espacios()->sync($request->espacios);
		}else {
			$publicidad->espacios()->sync(array());
		}
		Session::flash('success','Publicidad Agregada');
		return redirect()->route('publicidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		/*$maquinas = Auth::user()->maquinas()->paginate(10);
		return view('maquina.index')->withMaquinas($maquinas);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$publicidad=Publicidad::find($id);
		if(Auth::user()->id!=$publicidad->user_id){
			Session::flash('error','No puedes modificar esta publicidad');
			return redirect()->route('publicidad.index');
		}
		$espacios=Auth::user()->espacios;
		$mis_espacios=array();
		foreach ($espacios as $espacio){
			$mis_espacios[$espacio->id]=$espacio->maquina->name.'('.count($espacio->publicidads).')';
		}
		return view('publicidad.edit')->withPublicidad($publicidad)->withEspacios($mis_espacios);
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
		$publicidad=Publicidad::find($id);
		$this->validate($request,array(
			'name'=>'required|alpha_dash|max:128',
		));

		$publicidad->name=$request->input('name');

		$publicidad->save();
		$request_espacios=$request->espacios;
		if(isset($request_espacios)) {
			$espacios=$publicidad->espacios()->getRelatedIds();
			//TODO Verificcar que los espacios pertenezcan al user
			$total=count($request_espacios);
			for ($i=0;$i<$total;$i++){
				if(!in_array($request_espacios[$i],$espacios->toarray())){
					echo $request_espacios[$i];
					echo count(Espacio::find($request_espacios[$i])->publicidads);
					if(count(Espacio::find($request_espacios[$i])->publicidads)>1){
						unset($request_espacios[$i]);
						Session::flash('warning','No se ha vinculado la publicidad a un espacio: límite alcanzado');
					}
				}
			}
			$publicidad->espacios()->sync($request_espacios);
		}else {
			$publicidad->espacios()->sync(array());
		}
		Session::flash('success','Publicidad Modificada');
		return redirect()->route('publicidad.index');
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
    }
}
