<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el tipo',
        'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre para el tipo',
    ];
    
    public static $rules = [
        'name' => 'required|min:4'
    ];

    protected $fillable = ['name'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
