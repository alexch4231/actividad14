<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    //especificar que columnas puede editar el usuario en este caso solo name
    //'name','otra columna','otra columna'
    
    protected $fillable = [
        'name'
    ];

    public function superheroe(){
        return $this->hasMany(Superheroe::class);
    }
}
