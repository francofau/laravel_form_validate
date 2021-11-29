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
        ],
        [
          'nombre.required' => 'El nombre es obligatorio y no puede contener números',
          'email.required' => 'El email es obligatorio',
          'email.email' => 'Debe respetar el siguiente formato: email@email.com',
          'pass.required' => 'El campo contraseña es obligatorio y las que ingresó deben coincidir',
          'pass_confirmation.required' => 'Recuerde solo repetir la contraseña ingresada',
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
