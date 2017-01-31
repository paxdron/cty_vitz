<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
    	#Procesar las variables
		#Hablar al modelo
		#Recibir desde el modelo
		#Compilaar o procesar informacion del modelo si es necesario
		#Pasar la informacion al view correcpondiente
        return view('pages.home');
    }

	public function getSignin()
	{
		return view('pages.auth.signin');
    }

	public function getContact()
	{
		return view('pages.contact');
	}
	public function postContact()
	{

	}
}

