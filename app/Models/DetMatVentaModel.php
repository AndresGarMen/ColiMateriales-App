<?php

namespace App\Models;

use CodeIgniter\Model;

class DetMatVentaModel extends Model
{
    protected $table            = 'detalle_venta_material';
    protected $primaryKey       = 'id_detalle_venta_material';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    =
    [
        'id_material',
        'id_venta',
        'cantidad',
        'monto',

    ];
    
}
