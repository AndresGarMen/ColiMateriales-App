<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\MaterialModel;
// use App\Models\PuestoModel;
// use App\Models\DetEmpPuestoModel;

class MaterialController extends BaseController
{
    // AQUI VA EL CóDIGO DE LAS FUNCIONES DEL CONTROLADOR
    public function index()
    {
        // instancia del modelo persona
        $materialModel = new materialModel();

        // recuperar todos los personas de la bd
        $data['material'] = $materialModel
            ->select('material.*,persona.nombre as nomperson')
            ->join('persona', 'persona.id_persona=material.id_persona')
            ->paginate(15);
        $data['pager'] = $materialModel->pager;

        return view('material/index', $data);
    }

    public function crear()
    {
        return view('material/crear');
    }

    public function registrar()
    {
        $materialModel = new MaterialModel();
        $materialModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'marca' => $this->request->getPost('marca'),
            'existencias' => $this->request->getPost('existencias'),
            'dimensiones' => $this->request->getPost('dimensiones'),
            'precio' => $this->request->getPost('precio'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_persona' => session('empleado')->id_persona
        ]);

        session()->setFlashdata('sucess', 'El material fue registrado');

        return redirect()->to(base_url('material'));
    }

    public function editar($id)
    {
        $materialModel = new MaterialModel();
        $data['material'] = $materialModel->find($id);
        return view('material/editar', $data);
    }

    public function actualizar($id)
    {
        $materialModel = new MaterialModel();

        $materialModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'marca' => $this->request->getPost('marca'),
            'existencias' => $this->request->getPost('existencias'),
            'dimesiones' => $this->request->getPost('dimensiones'),
            'precio' => $this->request->getPost('precio'),
            'descripcion' => $this->request->getPost('descripcion'),

        ]);

        session()->setFlashdata('success', 'El material fue actualizado');

        return redirect()->to(base_url('material'));
    }

    public function eliminar($id)
    {
        $materialModel = new  MaterialModel();
        $materialModel->update($id, ['status' => 0]);
        session()->setFlashdata('success', ' El material fue eliminado');
        return redirect()->to(base_url('material'));
    }
}
