<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipio';

    protected $primaryKey = 'Id';

    public $timestamps = false;


    protected $fillable = [
        'Nombre',
        'Departamento'
    ];

    protected $guarded = [];

    public function departamentos()
    {
        return $this->belongsTo('App\Models\Departamento', 'Departamento', 'Id');
    }
}
