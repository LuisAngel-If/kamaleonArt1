<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypeController extends Controller
{
    //
    public function index(){
        $types = Type::OrderBy('id')->paginate(15);
        return view('admin.types.index')->with(compact('types'));
    }

    public function create(){
        return view('admin.types.create');
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

        $this->Validate($request, Type::$rules, Type::$messages);

        // Technique::create([
        //     'name' => 'hola'
        // ]);
        $type = Type::create($request->all());


       // $products = Product::all();
       $notification = 'El Tipo de Obra ' . $type->name .' se ha agregado a tu listado de Tipos!';
       // $products = Product::all();
        return redirect('/admin/types')->with(compact('notification'));
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit(Type $type){
      //  return "formulario de edicion con id $id";
        //$technique = Technique::find($id);
        return view('admin.types.edit')->with(compact('type'));
    
    }

    public function update(Request $request, Type $type){
        //dd($request->all());

        // $messages = [
        //     'name.required' => 'Es necesario ingresar un nombre para la técnica',
        //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica',
        // ];
        
        // $rules = [
        //     'name' => 'required|min:4'
        // ];

        $this->Validate($request, Type::$rules, Type::$messages);

        $type->update($request->all());
        
        $notification = 'El Tipo de Obra ' . $type->name .' se ha editado de tu listado de Tipos!';
        return redirect('/admin/types')->with(compact('notification'));
    }

    public function destroy(Type $type){
        //dd($request->all());

          
        // $product = Product::find($id);
        // $product->delete(); 
        Type::where('enabled', true)->get();
        $type->delete();
        $notification = 'El Tipo de Obra ' . $type->name .' se ha eliminado de tu listado de Tipos!';
        return back()->with(compact('notification'));
    }
}
