<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Technique;

class TechniqueController extends Controller
{
    //
    public function index(){
        $techniques = Technique::OrderBy('id')->paginate(15);
        return view('admin.techniques.index')->with(compact('techniques'));
    }

    public function create(){
        return view('admin.techniques.create');
    }

    public function store(Request $request){
        //dd($request->all());
        // $messages = [
        //     'name.required' => 'Es necesario ingresar un nombre para la técnica',
        //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica'
        // ];
        
        // $rules = [
        //     'name' => 'required|min:4'
        // ];

        $this->Validate($request, Technique::$rules, Technique::$messages);

        // Technique::create([
        //     'name' => 'hola'
        // ]);
        $technique = Technique::create($request->all());


       // $products = Product::all();
       $notification = 'La Técnica ' . $technique->name .' se ha agregado a tu listado de Técnicas!';
       // $products = Product::all();
        return redirect('/admin/techniques')->with(compact('notification'));
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit(Technique $technique){
      //  return "formulario de edicion con id $id";
        //$technique = Technique::find($id);
        return view('admin.techniques.edit')->with(compact('technique'));
    
    }

    public function update(Request $request, Technique $technique){
        //dd($request->all());

        // $messages = [
        //     'name.required' => 'Es necesario ingresar un nombre para la técnica',
        //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica',
        // ];
        
        // $rules = [
        //     'name' => 'required|min:4'
        // ];

        $this->Validate($request, Technique::$rules, Technique::$messages);

        $technique->update($request->all());

        $notification = 'La Técnica ' . old('name', $technique->name) .' se ha actualizo en tu listado de Técnicas!';
        return redirect('/admin/techniques')->with(compact('notification'));
    }

    public function destroy(Technique $technique){
        //dd($request->all());

          
        // $product = Product::find($id);
        // $product->delete(); 
        Technique::where('enabled', true)->get();
        $technique->delete();
        $notification = 'La técnica ' . $technique->name .' se ha eliminado de tu listado de Técnicas';
    	return back()->with(compact('notification'));
    }
}
