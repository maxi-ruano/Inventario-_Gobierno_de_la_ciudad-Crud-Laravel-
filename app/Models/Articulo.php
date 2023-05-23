<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;


class Articulo extends Model
{
    use HasFactory;
    use Userstamps;
     


    protected $fillable = ['idcategoria','nombre','modelo','serial','descripcion','id_setarticulo','estado','id_gabinete'];

  

    public function categoria(){
        return $this -> belongsTo('App\Models\Categoria'); 
    }
  
    public function marca(){
        return $this -> belongsTo('App\Models\Marca'); 
    }
    
    

    public function user(){
        return $this -> belongsTo('App\Models\User'); 
    }

    //Relacion muchos a muchos

   public function set_articulos(){
        return $this -> belongsTo('App\Models\SetArticulo'); 
    } 

    
     public function gabinete()
     {
         return $this->belongsTo(Gabinete::class);
     }

}