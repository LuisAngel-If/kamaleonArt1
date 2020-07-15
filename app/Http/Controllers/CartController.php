<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;
use App\Cart;

#Convierte el carrito de compras activo en un pedido
# pendiente para que el administrador decida si aprobarlo
# o cancelarlo
class CartController extends Controller
{
    public function update(Request $req){
        #dd($req);


		$client = auth()->user(); 
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();//Carbon manipula fechas facilmente
    	$cart->save(); // UPDATE

    	$admins = User::where('admin', true)->get();
		Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
    	return back()->with(compact('notification'));
    }

    public function updateStatus(Request $req){

        $order = auth()->user()->orderDetails;
        
        # validar
        $order->status = $req->status;

        #Al cambiar a finalizado, la fecha de llegada se coloca como actual
        if($req->status == "Finalizado")
            $order->arrived_date = Carbon::now();
        $order->save();  
        
        $notification           = "¡El status del producto ha cambiado!";
        return back()->with(compact('notification'));
    }

    public function destroy(Request $req){

        #$order = auth()->user()->cart;
        #$order = Cart::find($req->order_id);
        $order = auth()->user()->orderDetails;
 
        #if($cartDetail->cart_id == auth()->user()->cart->id)
        $order->delete();

        $notification = "¡El pedido seleccionado se ha eliminado correctamente!.";
        return back()->with(compact('notification'));

    }

    private function generateCode($len){

        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
        $cadena = ""; //variable para almacenar la cadena generada
        for($i=0;$i<$len;$i++)
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
        entre el rango 0 a Numero de letras que tiene la cadena */
        return $cadena;
      
    }
}
