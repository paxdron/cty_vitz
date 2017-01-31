<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
		if(Auth::user()->isSuperAdmin()) {
			$users=User::orderBy('id','desc')->paginate(10);
		}elseif (Auth::user()->isAdmin()){
			$users=User::where('admin_by',Auth::user()->id)->orderBy('id','desc')->paginate(4);
		}else{
			redirect()->route('index');
		}
		return view('user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar la informacion
		//Agregar a la BD
		//redireccionar

		/*$this->validate($request,array(
			'email'=>'required|email|max:128',
			'name'=>'required|alpha_dash|max:128',
			'password'=>'required|alpha|max:128',
		));

		$user=new User();
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=$request->password;

		$user->save();
		Session::flash('success','EL usuario '.$user->name.' fue Creado');
		return redirect()->route('users.show',$user->id);
		*/
		//controlado por register
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO
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
        //TODO
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
		$user=User::find($id);
		$user->delete();
		Session::flash('success','Usuario '.$user->name.' Eliminado' );
		return redirect()->route('users.index');
    }
}
