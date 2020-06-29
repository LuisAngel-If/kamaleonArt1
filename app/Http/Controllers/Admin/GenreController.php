<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genre;

class GenreController extends Controller
{
    //
    public function index(){
        $genres = Genre::OrderBy('id')->paginate(15);
        return view('admin.genres.index')->with(compact('genres'));
    }

    public function create(){
        return view('admin.genres.create');
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

        $this->Validate($request, Genre::$rules, Genre::$messages);

        // Genre::create([
        //     'name' => 'hola'
        // ]);
     
        $genre = Genre::create($request->all());
        

        $notification = 'El Género ' . $genre->name .' se ha agregado a tu listado de Género!';
       // $products = Product::all();
        return redirect('/admin/genres')->with(compact('notification'));
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit(Genre $genre){
      //  return "formulario de edicion con id $id";
        //$technique = Technique::find($id);
        return view('admin.genres.edit')->with(compact('genre'));
    
    }

    public function update(Request $request, Genre $genre){
        //dd($request->all());

        // $messages = [
        //     'name.required' => 'Es necesario ingresar un nombre para la técnica',
        //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica',
        // ];
        
        // $rules = [
        //     'name' => 'required|min:4'
        // ];

        $this->Validate($request, Genre::$rules, Genre::$messages);

        $genre->update($request->all());
        
       // $notification = 'El Género se ha eliminado!';
        $notification = 'El Género ' . old('name', $genre->name) .' se ha actualizo en tu listado de Género!';
        return redirect('/admin/genres')->with(compact('notification'));
    }

    public function destroy(Genre $genre){
        //dd($request->all());

          
        // $product = Product::find($id);
        // $product->delete(); 
        Genre::where('enabled', true)->get();
        $genre->delete();
        $notification = 'El Género ' . $genre->name .' se ha eliminado de tu listado de Género';
    	return back()->with(compact('notification'));
    }
}
