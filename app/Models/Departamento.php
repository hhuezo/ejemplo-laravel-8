<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamento';

    protected $primaryKey = 'Id';

    public $timestamps = false;


    protected $fillable = [
        'Nombre'
    ];

    protected $guarded = [];

    public function municipios()
    {
        return $this->hasMany('App\Municipio', 'Departamento');
    }
}
