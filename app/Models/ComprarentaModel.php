<?php

namespace App\Models;

use CodeIgniter\Model;

class comprarentaModel extends Model
{
    protected $table = 'material';//nombre de la tabla de la bd
    protected $primaryKey = 'id_material';//nombre de la llave primaria, que se usa en los metodos
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = 
    [
        'psn_nombre',
        'psn_sueldo',
    ];
}