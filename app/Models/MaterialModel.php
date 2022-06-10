<?php

namespace App\Models;

use CodeIgniter\Model;

class materialModel extends Model
{
    protected $table = 'material'; //nombre de la tabla de la bd
    protected $primaryKey = 'id_material'; //nombre de la llave primaria, que se usa en los metodos
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'nombre',
        'marca',
        'existencias',
        'dimensiones',
        'precio',
        'descripcion',
        'id_persona',
        'status',
    ];
}
