<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class ApiModel extends Model
{

    public function getAllEmpleados()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM persona   ORDER BY nombre'); // * Ejecuta la consulta

        $results = $query->getResult(); // * convierte la consulta a un objeto array

        // * se crea un objeto que por default envia un resultado como falso
        $data['response'] = [
            'result' => FALSE,
            'message' => 'No se han encontrado la persona'
        ];

        // * al ejecutar la consulta, nos regresa un array, count() nos regresa el numero de filas, no la consulta encontro nada, el numero de filas es 0, pero si encuentra, entonces el numero de filas es mayor a 1
        if (count($results) > 0) {
            $data['response'] = [
                'result' => TRUE,
                'message' => 'Se han encontrado registros'
            ]; // * cambiamos el mensaje a verdadero
            $columnas = 0;
            foreach ($results as $row) {
                $data['datos'][$columnas] = [
                    'id_persona' => $row->id_persona,
                    'num_control' => $row->num_control,
                    'nombre' => $row->nombre,
                    'semestre' => $row->semestre,
                    'carrera' => $row->carrera,
                    'dimicilio' => $row->dimicilio,
                    'num_tel' => $row->num_tel,
                    'usuario' => $row->usuario
                ];
                $columnas = $columnas + 1;
            }
        }

        $db->close(); // * Cierra conexion con la BD

        return $data; // * Regresa al modelo el objeto $data[]
    }
}
