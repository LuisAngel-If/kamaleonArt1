<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technique;

class TechniqueController extends Controller
{
    //
    public function show(Technique $technique){
      $product = $technique->products()->paginate(10);
        return view('techniques.show')->with(compact('technique', 'product'));
        
        
    }
}
