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
      
        $artists = Artist::orderBy('nameArt')->get();
        return view('admin.artists.create')->with(compact('artists'));
    }

    public function store(Request $request){
        //dd($request->all());
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el Artista',
                'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre para el Artista',
                'Ap.required' => 'Es necesario ingresar un Apellido Paterno para el Artista',
                'Ap.min' => 'Es necesario ingresar más de 4 carácteres en el Apellido Paterno para el Artista',
                'Am.required' => 'Es necesario ingresar un Apellido Materno para el Artista',
                'Am.min' => 'Es necesario ingresar más de 4 marácteres en el Apellido Materno para el Artista',
                'nameArt.required' => 'Es necesario ingresar un Nombre Artístico para el Artista',
                'nameArt.min' => 'Es necesario ingresar más de 4 carácteres en el Nombre Artístico para el Artista',
                'imagen.required' => 'Es necesario ingresar una imagen de perfil para el Artista',
                'imagen.mimes' => 'Es necesario ingresar una imagen para el perfil del Artista de tipo: jpeg, bmp, png',
                'imagenAlu.required' => 'Es necesario ingresar una imagen para la Portada del Artista',
                'imagenAlu.mimes' => 'Es necesario ingresar una imagen para la portada del Artista de tipo: jpeg, bmp, png',
                'urlFa.required' => 'Es necesario ingresar la URL del Artista',
                'urlFa.min' => 'Es necesario ingresar 8 carácteres para la URL para el Artista',
                'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción para el Artista',
                'descripcion.max' => 'Solo se permite máximo 1300 carácteres en el campo descripción para el Artista',
                'descripcion.required' => 'Es necesario ingresar una descripción para el Artista',
        ];
        
        $rules = [
            'name' => 'required|min:4',
            'Ap' => 'required|min:4',
            'Am' => 'required|min:4',
            'nameArt' => 'required|min:4',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'imagenAlu' => 'required|mimes:jpeg,bmp,png',
            'urlFa' => 'required|min:8',
            'descripcion' => 'required|min:10|max:1300'

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

        if($request->hasFile('imagenAlu')){
            $file = $request->file('imagenAlu');
            $nameAlu = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $nameAlu);
        }


        $artist = new Artist;
        $artist->name = $request->input('name');
        $artist->Ap = $request->input('Ap');
        $artist->Am = $request->input('Am');
        $artist->nameArt = $request->input('nameArt');
        $artist->imagen = $name;
        $artist->imagenAlu = $nameAlu;
        $artist->urlFa = $request->input('urlFa');
        $artist->descripcion = $request->input('descripcion');
        $artist->save();     
       // $products = Product::all();
       $notification = 'El Artista ' . $artist->name .' se ha agregado a tu listado de Artistas!';
        return redirect('/admin/artists')->with(compact('notification'));
    }


    public function edit($id){
      //  return "formulario de edicion con id $id";
        
        $artist = Artist::find($id);
        return view('admin.artists.edit')->with(compact('artist'));
    
    }

    public function update(Request $request, $id){
        //dd($request->all());

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el Artista',
            'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre para el Artista',
            'Ap.required' => 'Es necesario ingresar un Apellido Paterno para el Artista',
            'Ap.min' => 'Es necesario ingresar más de 4 carácteres en el Apellido Paterno para el Artista',
            'Am.required' => 'Es necesario ingresar un Apellido Materno para el Artista',
            'Am.min' => 'Es necesario ingresar más de 4 marácteres en el Apellido Materno para el Artista',
            'nameArt.required' => 'Es necesario ingresar un Nombre Artístico para el Artista',
            'nameArt.min' => 'Es necesario ingresar más de 4 carácteres en el Nombre Artístico para el Artista',
            'imagen.required' => 'Es necesario ingresar una imagen de perfil para el Artista',
            'imagen.mimes' => 'Es necesario ingresar una imagen para el perfil del Artista de tipo: jpeg, bmp, png',
            'imagenAlu.required' => 'Es necesario ingresar una imagen para la Portada del Artista',
            'imagenAlu.mimes' => 'Es necesario ingresar una imagen para la portada del Artista de tipo: jpeg, bmp, png',
            'urlFa.required' => 'Es necesario ingresar la URL del Artista',
            'urlFa.min' => 'Es necesario ingresar 8 carácteres para la URL para el Artista',
            'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción para el Artista',
            'descripcion.max' => 'Solo se permite máximo 1300 carácteres en el campo descripción para el Artista',
            'descripcion.required' => 'Es necesario ingresar una descripción para el Artista',
        ];
        
        $rules = [
            'name' => 'required|min:4',
            'Ap' => 'required|min:4',
            'Am' => 'required|min:4',
            'nameArt' => 'required|min:4',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'imagenAlu' => 'required|mimes:jpeg,bmp,png',
            'urlFa' => 'required|min:8',
            'descripcion' => 'required|min:10|max:1300'

        ];

        $this->Validate($request, $rules, $messages);

      
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }

        if($request->hasFile('imagenAlu')){
            $file = $request->file('imagenAlu');
            $nameAlu = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $nameAlu);
        }


        $artist = Artist::find($id);
        $artist->name = $request->input('name');
        $artist->Ap = $request->input('Ap');
        $artist->Am = $request->input('Am');
        $artist->nameArt = $request->input('nameArt');
        $artist->imagen = $name;
        $artist->imagenAlu = $nameAlu;
        $artist->urlFa = $request->input('urlFa');
        $artist->descripcion = $request->input('descripcion');
        $artist->save();   

        $notification = 'El Artista ' . $artist->name .' se ha editado a tu listado de Artistas!';
        return redirect('/admin/artists')->with(compact('notification'));
    }

    public function destroy($id){
        //dd($request->all());

        $artist = Artist::find($id);
        $artist->delete();   
          
        $notification = 'El Producto ' . $artist->name .' se ha eliminado de tu listado de Productos!';
        return back()->with(compact('notification'));
    }
}
