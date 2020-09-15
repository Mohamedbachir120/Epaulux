<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modele;
use App\Ref;

use App\Commande;
class Products extends Model
{
    //
    function modeles(){
        return $this->belongsToMany(Modele::class);
    }
      function refs(){
        return $this->belongsToMany(Ref::class);
    }

    function commandes(){

        return $this->hasMany(Commande::class);
    } 


    public $directory="/public/";
    public function getcontenu($value){
        return $this->directory . $value;
    }

    public function getmodele_id($id){
        return Modele::findOrFail($id)->name; 
    }

}
