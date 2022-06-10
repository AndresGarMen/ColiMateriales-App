<?php

namespace App\Controllers;

use App\Models\MiModelo;
use App\Models\VentaModel;
use App\Models\MaterialModel;
use App\Models\PersonaModel;
use App\Models\DetMatVentaModel;

class Home extends BaseController
{

    // * muestra vista de formulario de login
    public function index()
    {
        return view('auth/login');
    }

    //funcion para cargar vistas
    public function view($page = 'inicio')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('pages/head');
        echo view('pages/navbar');
        echo view('pages/' . $page);
        echo view('pages/footer');
    }
    public function reportes()
    {
        return view('reportes');
    }

    //CRUD
    // CREATE = INSERT = CREAR UN NUEVO REGISTRO EN BD
    // READ = SELECT = HACER UNA CONSULTA EN LA BD
    // UPDATE = == HACER UNA ACTUALIZACION DE UN REGISTRO EN LA BD
    // DELETE = == BORRAR UN REGISTRO EN LA BD
    function readEmpleados()
    {
        echo "Mostrando todos los empleados";
    }




    public function materialesrenta()
    {
        $ventaModel = new VentaModel();
        // recuperar todos los personas de la bd
        $data['venta'] = $ventaModel->where('venta_o_renta', 'Renta')->where('venta.status', 1)
            ->select('venta.*,persona.nombre as nomperson,material.nombre as nommaterial')
            ->join('detalle_venta_material as det', 'det.id_venta = venta.id_venta')
            ->join('persona', 'persona.id_persona=venta.id_persona')
            ->join('material', 'material.id_persona=venta.id_persona')
            ->groupBy('det.id_venta')
            ->orderBy('fecha', 'desc')
            ->paginate(15);
        $data['pager'] = $ventaModel->pager;
        return view('materialesrenta', $data);
    }








    public function historialusuarios()
    {
        $ventaModel = new VentaModel();
        // recuperar todos los personas de la bd
        $data['venta'] = $ventaModel
            ->select('venta.*')
            ->join('detalle_venta_material as det', 'det.id_venta = venta.id_venta')
            ->groupBy('det.id_venta')
            ->orderBy('fecha', 'desc')
            ->paginate(15);
        $data['pager'] = $ventaModel->pager;
        return view('historialusuarios', $data);
    }



    public function materialespedidosrentados()
    {
        $ventaModel = new VentaModel();
        // recuperar todos los personas de la bd
        $data['venta'] = $ventaModel
            ->select('venta.*, sum(cantidad*monto) as montototal')
            ->join('detalle_venta_material as det', 'det.id_venta = venta.id_venta')
            ->groupBy('det.id_venta')
            ->orderBy('fecha', 'desc')
            ->paginate(15);
        $data['pager'] = $ventaModel->pager;
        return view('materialespedidosrentados', $data);
    }



    public function duenomaterial()
    {
        $materialModel = new MaterialModel();

        $data['material'] = $materialModel
            ->select('material.nombre,persona.nombre as nomperson')
            ->join('persona', 'persona.id_persona=material.id_persona')
            ->paginate(15);
        $data['pager'] = $materialModel->pager;

        return view('dueñomaterial', $data);
    }

    /*
    public function prestamosPorEmpleado()
    {
        $prestamoModel = new PrestamoModel();
        $data['prestamosPorEmpleado'] = $prestamoModel
            ->select('empleado.emp_nombre,
                count(prestamo.id_empleado) as prestamos,
                count(prestamo.estado = "APROVADO" or
                null) as aprovados')
            ->join('empleado', 'empleado.id_empleado = 
            prestamo.id_empleado')
            ->groupBy('prestamo.id_empleado')
            ->orderBy('prestamos', 'desc')
            ->paginate(25);
        $data['pager'] = $prestamoModel->pager;
        return view('reportePrestamoPorEmpleado', $data);
    }*/
}
