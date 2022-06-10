<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\ComprarentaModel;
// use App\Models\PuestoModel;
// use App\Models\DetEmpPuestoModel;

class ComprarentaController extends BaseController
{
    // AQUI VA EL CóDIGO DE LAS FUNCIONES DEL CONTROLADOR
    public function registrar()
    {
        $comprarentaModel = new ComprarentaModel();
        $comprarentaModel->insert([
            'pst_nombre' => $this->request->getPost('pst_nombre'),
            'pst_sueldo' => $this->request->getPost('pst_sueldo')
        ]);

        session()->setFlashdata('sucess', 'El puesto fue registrado');

        return redirect()->to(base_url('venta'));
    }

    public function crear()
    {
        return view('comprarenta/crear');
    }


}