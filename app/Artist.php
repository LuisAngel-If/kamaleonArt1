<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
    // public static $messages = [
    //     'name.required' => 'Es necesario ingresar un nombre para el Artista',
    //     'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre para el Artista',
    //     'Ap.required' => 'Es necesario ingresar un Apellido Paterno para el Artista',
    //     'Ap.min' => 'Es necesario ingresar más de 4 carácteres en el Apellido Paterno para el Artista',
    //     'Am.required' => 'Es necesario ingresar un Apellido Materno para el Artista',
    //     'Am.min' => 'Es necesario ingresar más de 4 marácteres en el Apellido Materno para el Artista',
    //     'nameArt.required' => 'Es necesario ingresar un Nombre Artístico para el Artista',
    //     'nameArt.min' => 'Es necesario ingresar más de 4 carácteres en el Nombre Artístico para el Artista',
    // ];
    
    // public static $rules = [
    //     'name' => 'required|min:4',
    //     'Ap' => 'required|min:4',
    //     'Am' => 'required|min:4',
    //     'nameArt' => 'required|min:4'
    // ];

    // protected $fillable = ['name', 'Ap', 'Am', 'nameArt'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
