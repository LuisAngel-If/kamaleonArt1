<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Artist;

class ProductController extends Controller
{
    //

    public function show($id){
        $product = Product::find($id);
        return view('products.show')->with(compact('product'));
    }
    public function showArt($id){
        $artist = Artist::find($id);
        return view('artists.show')->with(compact('artist'));
    }
}
