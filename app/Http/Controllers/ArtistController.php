<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;

class ArtistController extends Controller
{
    //
    public function welcome2()
    {
        //compact crea una arreglo a partir de los parametros que le pasamos por ejemplo products
        // $products = Product::all();
        $products = Artist::all();
        return view('tienda', compact('products'));
        //arreglo asociativo
    
    }
}
