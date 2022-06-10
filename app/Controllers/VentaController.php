<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\VentaModel;
use App\Models\MaterialModel;
use App\Models\PersonaModel;
use App\Models\DetMatVentaModel;

// use App\Models\PuestoModel;
// use App\Models\DetEmpPuestoModel;

class VentaController extends BaseController
{
    // AQUI VA EL CóDIGO DE LAS FUNCIONES DEL CONTROLADOR
    public function index()
    {
        // instancia del modelo persona
        $ventaModel = new VentaModel();
        // recuperar todos los personas de la bd
        $data['venta'] = $ventaModel->where('status',1)
            ->select('venta.*, sum(cantidad*monto) as montototal')
            ->join('detalle_venta_material as det', 'det.id_venta = venta.id_venta')
            ->groupBy('det.id_venta')
            ->orderBy('fecha', 'desc')
            ->paginate(15);
        $data['pager'] = $ventaModel->pager;
        return view('venta/index', $data);
    }

    public function crear()
    {
        $personaModel = new personaModel();
        $materialModel = new MaterialModel();
        $data['persona'] = $personaModel->findAll();
        $data['material'] = $materialModel->where('existencias >', 0)->findAll();
        return view('venta/crear', $data);
    }

    public function registrar()
    {
        $ventaModel = new VentaModel();
        $detModel = new DetMatVentaModel();
        $materialModel = new MaterialModel();

        $fecha_hoy = strtotime(date("Y-m-d"));
        $fecha_hoy =  date("Y-m-d", $fecha_hoy);
        $fecha_dev = strtotime(date("Y-m-d"));
        $fecha_dev = strtotime("+3 day", $fecha_dev);
        $fecha_dev = date("Y-m-d", $fecha_dev);

        if (strtoupper($this->request->getPost('venta_o_renta')) == 'RENTA') {
            $venta = $ventaModel->insert([
                'venta_o_renta' => $this->request->getPost('venta_o_renta'),
                'total' => $this->request->getPost('montotal'),
                'id_persona' => session('empleado')->id_persona,
                'fecha' => $fecha_hoy,
                'fecha_devolucion' => $this->request->getPost('fecha_devolucion')
            ]);
        } else {
            $venta = $ventaModel->insert([
                'venta_o_renta' => $this->request->getPost('venta_o_renta'),
                'total' => $this->request->getPost('montotal'),
                'fecha' => $fecha_hoy,
                'id_persona' => session('empleado')->id_persona,
            ]);
        }

        foreach ($this->request->getPost('productos') as $key => $value) {
            $productoAnt = $materialModel->find($value['id_producto']);
            $detModel->insert([
                'id_venta' => $venta,
                'id_material' => $value['id_producto'],
                'cantidad' => $value['cantidad'],
                'monto' => $value['precio_venta'],
            ]);
            // actualizar el stock del producto
            $cantidad = $productoAnt->existencias - $value['cantidad'];
            $materialModel->update($value['id_producto'], [
                'existencias' => $cantidad
            ]);
            // echo ' id_producto ' . $value['id_producto'];
            // echo ' cantidad ' . $value['cantidad'];
        }

        session()->setFlashdata('sucess', 'La venta fue registrado');

        return redirect()->to(base_url('venta'));
    }

    public function editar($id)
    {
        $ventaModel =  new VentaModel();
        $personaModel = new PersonaModel();
        $detModel = new DetMatVentaModel();
        $materialModel = new MaterialModel();
        $data['persona'] = $personaModel->findAll();
        $data['material'] = $materialModel->where('existencias >', 0)->findAll();
        $data['venta'] = $ventaModel->find($id);
        $data['detalleVenta'] =  $detModel
            ->select('detalle_venta_material.*,material.nombre,material.existencias as stock')
            ->join('material', 'material.id_material = detalle_venta_material.id_material')
            ->where('detalle_venta_material.id_venta', $id)
            ->findAll();

        return view('venta/editar', $data);
    }

    public function actualizar($id)
    {
        $ventaModel = new VentaModel();
        $detModel = new DetMatVentaModel();
        $materialModel = new MaterialModel();

        $ventaModel->update($id, [
            'venta_o_renta' => $this->request->getPost('venta_o_renta'),
            'fecha_devolucion' => $this->request->getPost('fecha_devolucion'),
            'total' => $this->request->getPost('total'),
            'id_persona' => $this->request->getPost('id_persona')
        ]);

        $detModel->where('id_venta', $id)->delete();

        foreach ($this->request->getPost('productos') as $key => $value) {
            $productoAnt = $materialModel->find($value['id_producto']);
            $detModel->insert([
                'id_venta' => $id,
                'id_material' => $value['id_producto'],
                'cantidad' => $value['cantidad'],
                'monto' => $value['precio_venta'],
            ]);
            // actualizar el stock del producto
            $cantidad = $productoAnt->existencias - $value['cantidad'];
            $materialModel->update($value['id_producto'], [
                'existencias' => $cantidad
            ]);
        }

        session()->setFlashdata('success', 'El venta fue actualizado');

        return redirect()->to(base_url('venta'));
    }

    public function eliminar($id)
    {
        $ventaModel = new VentaModel();
        $ventaModel->update($id, ['status' => 0]);
        session()->setFlashdata('success', 'El venta fue eliminada');
        return redirect()->to(base_url('venta'));

    }

    public function detalle($id)
    {
        // instancia del modelo persona
        $detMatVentaModel = new DetMatVentaModel();

        // recuperar todos los personas de la bd
        $data['detalles'] = $detMatVentaModel->where('id_venta',$id)->paginate(15);

        $data['pager'] = $detMatVentaModel->pager;
        
        return view('venta/detalle', $data);
    } 
}
