<?php 
namespace App\Models;
use CodeIgniter\Model;

class CorregirModel extends Model{ 
 
      
protected $table = 'correcion'; 
protected $primaryKey = 'id';
protected $useAutoIncrement = false; 
protected $returnType = 'array'; //tambien se puede usar como object
protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','usuario_modificado']; //Van los campos de la tabla
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

public function mostrarHistorialCorregir($id){
    $builder = $this->db->table('correcion');
    $builder->select('correcion.*');
    $builder->where('correcion.id',$id);
    return $builder->get()->getResultArray();
}
}