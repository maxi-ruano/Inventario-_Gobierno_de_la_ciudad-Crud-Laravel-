<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;


class SetArticulo extends Model
{
    use HasFactory;
    use Userstamps;

    //Relacion muchos a muchos

   public function articulos(){
       return $this -> hasMany('App\Models\Articulo','id_setarticulo');
}
}
