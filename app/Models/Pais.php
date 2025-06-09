<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $primaryKey = 'id_pais'; // <- Esto es clave
    public $incrementing = true; // si es auto incremental
    protected $keyType = 'int';

    protected $fillable = ['nombre'];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'id_pais', 'id_pais');
    }
}