<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;

class MensajeController extends Controller
{
    //
    public function create(){
        $mensajes = Mensaje::orderBy('name')->get();
        return view('mensaje')->with(compact('mensajes'));
    }

    public function store(Request $request){
     

        // $file = $request->file('imagen');
        // $path = public_path() . '/img/';
        // $fileName = uniqid() . $file->getClientOriginalName();
        // $file->move($path, $fileName);
  
        $mensaje = new Mensaje;
        $mensaje->name = $request->input('name');
        $mensaje->email = $request->input('email');
    
        $mensaje->descripcion = $request->input('descripcion');
        
         

        $mensaje->save();     
       // $products = Product::all();
       $notification = 'El Mensaje se ha enviado';
        return redirect('/admin/products')->with(compact('notification'));
    }
}
