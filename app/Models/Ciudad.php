<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades'; 

    protected $fillable = ['nombre', 'estado', 'id_pais', 'created_at'];

   public function pais()
{
    return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
}

}
