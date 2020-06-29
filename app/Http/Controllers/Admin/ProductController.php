<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Artist;
use App\Technique;
use App\Type;
use App\Genre;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::OrderBy('id')->paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create(){
        $types = Type::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        $techniques = Technique::orderBy('name')->get();
        $artists = Artist::orderBy('nameArt')->get();
        return view('admin.products.create')->with(compact('artists', 'techniques', 'types', 'genres'));
    }

    public function store(Request $request){
        //dd($request->all());
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Es necesario ingresar más de 5 carácteres en el nombre',
            'imagen.required' => 'Es necesario ingresar una imagen',
            'imagen.mimes' => 'Es necesario ingresar una imagen de tipo: jpeg, bmp, png',
            'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción',
            'descripcion.required' => 'Es necesario ingresar una descripción',
            'fecha.required' => 'Es necesario ingresar una fecha',
            'estilo.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo estilo',
            'estilo.required' => 'Es necesario ingresar un estilo',
            'dimensiones.min' => 'Es necesario ingresar mínimo 5 carácteres en las dimensiones',
            'dimensiones.required' => 'Es necesario ingresar las dimensiones',
            'precio.min' => 'Es necesario ingresar mínimo de 0 en el campo precio',
            'precio.required' => 'Es necesario ingresar un precio',
            'technique_id.required' => 'Es necesario seleccionar una técnica',
            'type_id.required' => 'Es necesario seleccionar una tipo',
            'genres_id.required' => 'Es necesario seleccionar una género',
            'artist_id.required' => 'Es necesario seleccionar una artista'
        ];
        
        $rules = [
            'name' => 'required|min:5',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'descripcion' => 'required|min:10', 
            'fecha' => 'required|min:3',
            'estilo' => 'required|min:5', 
            'dimensiones' => 'required|min:5',
            'precio' => 'required|numeric|min:0',
            'technique_id' => 'required',
            'type_id' => 'required',
            'genres_id' => 'required',
            'artist_id' => 'required'

        ];

        $this->Validate($request, $rules, $messages);

        // $file = $request->file('imagen');
        // $path = public_path() . '/img/';
        // $fileName = uniqid() . $file->getClientOriginalName();
        // $file->move($path, $fileName);
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->imagen = $name;
      
        $product->descripcion = $request->input('descripcion');
        $product->fecha = $request->input('fecha');    
        $product->dimensiones = $request->input('estilo'); 
        $product->estilo = $request->input('dimensiones');  
        $product->precio = $request->input('precio'); 
        $product->technique_id = $request->technique_id;
        $product->type_id = $request->type_id;
        $product->genres_id = $request->genres_id;
        $product->artist_id = $request->artist_id; 
        
        
         

        $product->save();     
       // $products = Product::all();
       $notification = 'El Producto ' . $product->name .' se ha agregado a tu listado de Productos!';
        return redirect('/admin/products')->with(compact('notification'));
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit($id){
      //  return "formulario de edicion con id $id";
        $types = Type::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        $techniques = Technique::orderBy('name')->get();
        $artists = Artist::orderBy('nameArt')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'artists', 'techniques', 'types', 'genres'));
    
    }

    public function update(Request $request, $id){
        //dd($request->all());

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Es necesario ingresar más de 5 carácteres en el nombre',
            'imagen.required' => 'Es necesario ingresar una imagen',
            'imagen.mimes' => 'Es necesario ingresar una imagen de tipo: jpeg, bmp, png',
            'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción',
            'descripcion.required' => 'Es necesario ingresar una descripción',
            'fecha.required' => 'Es necesario ingresar una fecha',
            'estilo.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo estilo',
            'estilo.required' => 'Es necesario ingresar un estilo',
            'dimensiones.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo dimensiones',
            'dimensiones.required' => 'Es necesario ingresar las dimensiones',
            'precio.min' => 'Es necesario ingresar mínimo de 0 en el campo precio',
            'precio.required' => 'Es necesario ingresar un precio'
        ];
        
        $rules = [
            'name' => 'required|min:5',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'descripcion' => 'required|min:10', 
            'fecha' => 'required|min:3',
            'estilo' => 'required|min:5', 
            'dimensiones' => 'required|min:5',
            'precio' => 'required|numeric|min:0'
        ];

        $this->Validate($request, $rules, $messages);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->imagen = $name;
        $product->descripcion = $request->input('descripcion');
        $product->fecha = $request->input('fecha');    
        $product->dimensiones = $request->input('estilo'); 
        $product->estilo = $request->input('dimensiones');  
        $product->precio = $request->input('precio');
        $product->technique_id = $request->technique_id;
        $product->type_id = $request->type_id;
        $product->genres_id = $request->genres_id;
        $product->artist_id = $request->artist_id; 
        $product->save();   

        $notification = 'El Producto ' . $product->name .' se ha editado de tu listado de Productos!';
        return redirect('/admin/products')->with(compact('notification'));
    }

    public function destroy($id){
        //dd($request->all());

        $product = Product::find($id);
        $product->delete();   
          
        $notification = 'El Producto ' . $product->name .' se ha eliminado de tu listado de Productos!';
        return back()->with(compact('notification'));
    }
}
