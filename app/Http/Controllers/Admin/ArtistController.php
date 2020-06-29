<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artist;

class ArtistController extends Controller
{
    //
    public function index(){
        $artists = Artist::OrderBy('id')->paginate(15);
        return view('admin.artists.index')->with(compact('artists'));
    }

    public function create(){
        return view('admin.artists.create');
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

        $this->Validate($request, Artist::$rules, Artist::$messages);

        // Technique::create([
        //     'name' => 'hola'
        // ]);
        $artist = Artist::create($request->all());


       // $products = Product::all();
       $notification = 'El nombre del Artista ' . $artist->name .' se ha agregado a tu listado de Artistas!';
       // $products = Product::all();
        return redirect('/admin/artists')->with(compact('notification'));
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit(Artist $artist){
      //  return "formulario de edicion con id $id";
        //$technique = Technique::find($id);
        return view('admin.artists.edit')->with(compact('artist'));
    
    }

    public function update(Request $request, Artist $artist){
        //dd($request->all());

        // $messages = [
        //     'name.required' => 'Es necesario ingresar un nombre para la técnica',
        //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica',
        // ];
        
        // $rules = [
        //     'name' => 'required|min:4'
        // ];

        $this->Validate($request, Artist::$rules, Artist::$messages);

        $artist->update($request->all());
        
        $notification = 'El nombre del Artista' . $artist->name .' se ha editado de tu listado de Artistas!';
        return redirect('/admin/artists')->with(compact('notification'));
    }

    public function destroy(Artist $artist){
        //dd($request->all());

          
        // $product = Product::find($id);
        // $product->delete(); 
        Artist::where('enabled', true)->get();
        $artist->delete();
        $notification = 'El Artista ' . $artist->name .' se ha eliminado de tu listado de Artistas!';
        return back()->with(compact('notification'));
    }
}
