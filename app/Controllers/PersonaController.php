<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\PersonaModel;
// use App\Models\PuestoModel;
// use App\Models\DetEmpPuestoModel;

class PersonaController extends BaseController
{
    // AQUI VA EL CóDIGO DE LAS FUNCIONES DEL CONTROLADOR
    public function index()
    {
        // instancia del modelo persona
        $personaModel = new PersonaModel();

        // recuperar todos los personas de la bd
        $data['personas'] = $personaModel->where('estado',1)->paginate(15);

        $data['pager'] = $personaModel->pager;
        
        return view('persona/index', $data);
    } 

    public function crear()
    {
        return view('persona/crear');
    }

    public function registrar()
    {
        $personaModel = new PersonaModel();
        $personaModel->insert([
            'num_control' => $this->request->getPost('num_control'),
            'nombre' => $this->request->getPost('nombre'),
            'semestre' => $this->request->getPost('semestre'),
            'carrera' => $this->request->getPost('carrera'),
            'domicilio' => $this->request->getPost('domicilio'),
            'num_tel' => $this->request->getPost('num_tel'),
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena')
        ]);

        session()->setFlashdata('sucess', 'La persona fue registrada');

        return redirect()->to(base_url('persona'));
    }

    public function editar($id)
    {
        $personaModel = new PersonaModel();
        $data['persona']=$personaModel->find($id);
        return view('persona/editar', $data);
    }


    public function eliminar($id)
    {
        $personaModel = new  PersonaModel();
        $personaModel->update($id, ['estado' => 0 ]);
        session()->setFlashdata('success', 'La persona fue eliminada');
        return redirect()->to(base_url('persona'));
    }

    public function actualizar($id)
    {
        $personaModel = new PersonaModel();

        $personaModel->update($id, [
            'num_control' => $this->request->getPost('num_control'),
            'nombre' => $this->request->getPost('nombre'),
            'semestre' => $this->request->getPost('semestre'),
            'carrera' => $this->request->getPost('carrera'),
            'domicilio' => $this->request->getPost('domicilio'),
            'num_tel' => $this->request->getPost('num_tel'),
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
        ]);

        session()->setFlashdata('success', 'La persona fue actualizada');

        return redirect()->to(base_url('persona'));
    }
}