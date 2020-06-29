<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artist;

class Product extends Model
{
    //products->technique
   public function technique()
   {
       return $this->belongsTo(Technique::class);
   }

   public function genre()
   {
       return $this->belongsTo(Genre::class);
   }

   public function artist()
   {
       return $this->belongsTo(Artist::class);
   }

   public function type()
   {
       return $this->belongsTo(Type::class);
   }

   public function getArtistNameArt()
   {
       if($this->artist)
            return $this->artist->nameArt;
        
        return 'General';
   }

   public function getTechniqueName()
   {
       if($this->technique)
            return $this->technique->name;
        
        return 'General';
   }

   public function getTypeName()
   {
       if($this->type)
            return $this->type->name;
        
        return 'General';
   }

   public function getGenreName()
   {
       if($this->genre)
            return $this->genre->name;
        
        return 'General';
   }
}
