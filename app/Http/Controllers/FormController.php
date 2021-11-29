<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
   public function index(Request $request) {
        return view('formBootstrap');
    }

   public function guardar(Request $request) {         
        //Validamos los datos
        $request->validate([
          'nombre' => 'required',
          'email' => 'required | email | unique:forms',        
          'pass'=>'required | confirmed',
          'pass_confirmation' => 'required'
        ]);
        //Guardamos en la DB
        $form = new Form;
        $form->nombre = $request->nombre;
        $form->email = $request->email;
        $form->pass = $request->pass;
        $form->pass_confirmation = $request->pass_confirmation;
 
        $form->save();
        return back()->with('success', 'Formulario validado.');//Mensaje que veremos arriba del form        
    }
}
