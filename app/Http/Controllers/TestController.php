<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Artist;

class TestController extends Controller
{
    //
    public function welcome()
    {
        //compact crea una arreglo a partir de los parametros que le pasamos por ejemplo products
        // $products = Product::all();
        $artistas =Artist::all();
        $products = Product::paginate(12);
        return view('tienda')->with(compact('products', 'artistas'));
        //arreglo asociativo
    }//php artisan tinker (consola) $products = App\Producy::all();
    //use App\Product;
    //Product::count(); (count saber numero de productos)
    //products = Product::where('technique_id' 1)->get();
    
    public function welcome1()
    {
        //compact crea una arreglo a partir de los parametros que le pasamos por ejemplo products
        // $products = Product::all();
        $artists = Artist::paginate(12);
        return view('artistas')->with(compact('artists'));
        //arreglo asociativo
    
    }

    public function results()
    {
        return view('/results');     
    }

    public function listarArt(Request $artist_id){
        $artistas =Artist::all();
        $products = Product::where('artist_id', '=', '$name')->get(); 
        return view('tiendaart')->with(compact('products', 'artistas'));
    }

    public function listarArt1()
    {
        $artistas =Artist::all();
        $products = Product::paginate(12);
        return view('tiendaart')->with(compact('products', 'artistas'));
    }

    
}
