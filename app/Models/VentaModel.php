<?php

namespace App\Models;

use CodeIgniter\Model;

class ventaModel extends Model
{
    protected $table = 'venta'; //nombre de la tabla de la bd
    protected $primaryKey = 'id_venta'; //nombre de la llave primaria, que se usa en los metodos
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =
    [
        'fecha',
        'venta_o_renta',
        'fecha_devolucion',
        'total',
        'id_persona',
        'status',
    ];
}
