<?php 
namespace App\Models;
use CodeIgniter\Model;

class IngresoModel extends Model{ 
 
    public function obtenerUsuario($data){
            $Usuario = $this->db->table('ingreso');
			$Usuario->where($data);
			return $Usuario->get()->getResultArray();
}
}