<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'persona';

    protected $primaryKey = 'Id';

    public $timestamps = false;


    protected $fillable = [
        'Nombre',
        'Apellido',
        'Telefono',
        'Municipio'
    ];

    protected $guarded = [];

    public function municipios()
    {
        return $this->belongsTo('App\Models\Municipio', 'Municipio', 'Id');
    }
}
