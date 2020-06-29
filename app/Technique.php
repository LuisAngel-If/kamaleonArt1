<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la técnica',
        'name.min' => 'Es necesario ingresar más de 4 carácteres en el nombre de la técnica',
    ];
    
    public static $rules = [
        'name' => 'required|min:4'
    ];


    protected $fillable = ['name'];

    //technique -> produts
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //php artisan tinker
}
