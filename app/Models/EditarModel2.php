<?php 
namespace App\Models;
use CodeIgniter\Model;

class EditarModel2 extends Model{ 
 
      
protected $table = 'editar2'; 
protected $primaryKey = 'id';
protected $useAutoIncrement = false; 
protected $returnType = 'array'; //tambien se puede usar como object
protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','editor','estado_borrador','estado_modifcado','usuario_modificado']; //Van los campos de la tabla
/*Esta configurado para que de baja el registro pero no lo elimina completamente*/

// Dates - CHEQUEAR SI SIRVE PARA ESTE CASO
protected $useTimestamps = true; 
protected $dateFormat = 'datetime';
protected $createdField = 'fecha';
protected $updatedField = 'fecha_modificada';
#protected $deletedField = 'deleted_at';
#protected $validationRules = []; // Validation
#protected $validationMessages = [];
#protected $skipValidation = false;
#protected $cleanValidationRules = true;

public function mostrarEditarNoticias(){
    $builder = $this->db->table('editar2');
    $builder->select('editar2.*');

    return $builder->get()->getResultArray();
}

public function mostrarHistorialEditada2($id){
    $builder = $this->db->table('editar2');
    $builder->select('editar2.*');
    $builder->where('editar2.id',$id);
    return $builder->get()->getResultArray();
}

public function mostrarValidar(){
    $builder = $this->db->table('editar2');
    $builder->select('editar2.*');
    return $builder->get()->getResultArray();
}
public function mostrarCorreccion(){
    $builder = $this->db->table('editar2');
    $builder->select('editar2.*');
   return $builder->get()->getResultArray();
}
}