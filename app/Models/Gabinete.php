<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Gabinete extends Model
{
    
    use HasFactory;
    use Userstamps;


    protected $fillable = ['id_setarticulo', 'estado'];


    
    public function set_articulos(){
        return $this -> belongsTo('App\Models\SetArticulo'); 
    } 

    //Relacion muchos a muchos

   public function articulos(){
       return $this -> hasMany('App\Models\Articulo','id_gabinete');
}

public function articulos2()
    {
        return $this->hasMany(Articulo::class);
    }




    public function setArticulo()
{
    return $this->belongsTo(SetArticulo::class, 'id_setarticulo');
}
}
