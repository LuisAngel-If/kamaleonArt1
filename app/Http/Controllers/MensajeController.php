<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;


class MensajeController extends Controller
{
    //

    public function index(){
        $mensajes = Mensaje::OrderBy('id')->paginate(10);
        return view('/home')->with(compact('mensajes'));
    }

  public function store(Request $request){

    $messages = [
        'name.required' => 'Es necesario ingresar tu nombre completo',
        'name.min' => 'Es necesario ingresar más de 5 carácteres en el nombre',
        'email.required' => 'Es necesario ingresar el correo',
        'descripcion.required' => 'Es necesario escribir el mensaje'
    ];
    
    $rules = [
        'name' => 'required|min:5',  
        'email' => 'required',     
        'descripcion' => 'required|min:2', 
    ];

    $this->Validate($request, $rules, $messages);


    $message = new Mensaje();
    $message->name = $request->input('name');
    $message->email = $request->input('email');
    $message->descripcion = $request->input('descripcion');
    $message->save();

    $notification = "Tu mensaje ha sido enviado, tan pronto nos podremos en contacto!.";
    return back()->with(compact('notification'));
    }

    public function destroy($id){
        //dd($request->all());

        $mensaje = Mensaje::find($id);
        $mensaje->delete();   
          
        $notification = 'El Mensaje de la persona ' . $mensaje->name .' se ha eliminado correctamente!';
        return back()->with(compact('notification'));
    }
}
