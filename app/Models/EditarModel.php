<?php 
namespace App\Models;
use CodeIgniter\Model;

class EditarModel extends Model{ 
 
      
protected $table = 'editar'; 
protected $primaryKey = 'id';
protected $useAutoIncrement = false; 
protected $returnType = 'array'; //tambien se puede usar como object
protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','usuario_modificado','estado_modificado','estatus','estadoEvento']; //Van los campos de la tabla
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

public function mostrarHistorialEditada($id){
    $builder = $this->db->table('editar');
    $builder->select('editar.*');
    $builder->where('editar.id',$id);
    return $builder->get()->getResultArray();
}

public function mostrarValidar(){
    $builder = $this->db->table('editar');
    $builder->select('editar.*');
    return $builder->get()->getResultArray();
}

public function mostrarEditarNoticias(){
    $builder = $this->db->table('editar');
    $builder->select('editar.*');
    $builder->join('editar2', 'editar2.id = editar.id', 'left');
    $builder->where('editar2.id IS NULL OR editar.id IS NULL');
    return $builder->get()->getResultArray();
}
 
public function consultarID($id){
    $Usuario = $this->db->table('editar');
    $Usuario->where($id);
    return $Usuario->get()->getResultArray();
}

public function mostrarCorreccion(){
    $builder = $this->db->table('editar');
    $builder->select('editar.*');

   return $builder->get()->getResultArray();
}

#EVENTO
public function activarEvento($idEvento) {
    // Ejecutar la consulta SQL para activar el evento
    $builder = $this->db->table('editar');
    $builder->set('estadoEvento', 'Activo');
    $builder->where('id', $idEvento);
    $builder->update('editar');
}

#Mostrar INDEX
public function mostrarIndex(){
    $builder = $this->db->table('editar');
    $builder->select('editar.*');
    return $builder->get()->getResultArray();
}
}