<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'personajes';

    public function serie(){
        return $this->belongsTo(Serie::class, 'serie_id');
    }

}
