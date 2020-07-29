<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Artist;
use App\Type;
use App\Technique;
use App\Genre;

class ProductController extends Controller
{
    //

    public function show($id){
        $product = Product::find($id);
        return view('products.show')->with(compact('product'));
    }

    public function showA($name){
    
        $products = Product::where('artist_id', '=', $name)->get();
        return view('artistass')->with(compact('products'));
    }

    public function showG($name){
    
        $products = Product::where('genre_id', '=', $name)->get();
        return view('genre')->with(compact('products'));
    }

    public function showTy($name){
    
        $products = Product::where('type_id', '=', $name)->get();
        return view('type')->with(compact('products'));
    }

    public function showTe($name){
    
        $products = Product::where('technique_id', '=', $name)->get();
        return view('technique')->with(compact('products'));
    }

    public function showArt($id){
        $artist = Artist::find($id);
        return view('artists.show')->with(compact('artist'));
    }
}
