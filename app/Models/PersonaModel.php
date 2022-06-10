<?php

namespace App\Models;

use CodeIgniter\Model;

class personaModel extends Model
{
    protected $table = 'persona'; //nombre de la tabla de la bd
    protected $primaryKey = 'id_persona'; //nombre de la llave primaria, que se usa en los metodos
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [

        'num_control',
        'nombre',
        'semestre',
        'carrera',
        'domicilio',
        'num_tel',
        'usuario',
        'contrasena',
        'estado',
    ];
}
