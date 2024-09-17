<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoticiasModel extends Model{ 
 
      
protected $table = 'noticias'; 
protected $primaryKey = 'id';
protected $useAutoIncrement = true; 
protected $returnType = 'array'; //tambien se puede usar como object
protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
protected $protectFields    = true;
protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','estado_modificado','usuario_modificado','estado_borrador','estadoEvento']; //Van los campos de la tabla
/*Esta configurado para que de baja el registro pero no lo elimina completamente*/

// Dates - CHEQUEAR SI SIRVE PARA ESTE CASO
protected $useTimestamps = true; 
protected $dateFormat = 'datetime';
protected $createdField = 'fecha';
protected $updatedField = 'fecha_modificada';

public function mostrarEditarNoticias(){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
    $builder->join('editar', 'editar.id = noticias.id', 'left');
    $builder->where('editar.id IS NULL OR noticias.id IS NULL');
    return $builder->get()->getResultArray();
}

public function mostrarCategorias(){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
    return $builder->get()->getResultArray();
}

public function mostrarHistorial($id){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
    $builder->where('noticias.id',$id);
    
   return $builder->get()->getResultArray();
}

public function mostrarValidar(){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
    return $builder->get()->getResultArray();
}

public function mostrarCorreccion(){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
   $builder->join('correcion', 'correcion.id = noticias.id', 'left');
    $builder->where('correcion.id IS NULL OR noticias.id IS NULL');
   return $builder->get()->getResultArray();
}

#EVENTO
public function activarEvento($idEvento) {
    // Ejecutar la consulta SQL para activar el evento
    $builder = $this->db->table('noticias');
    $builder->set('estadoEvento', 'Activo');
    $builder->where('id', $idEvento);
    $builder->update('noticias');
}

#EVENTO
public function activarEventoAutomatico($idEvento) {
    // Ejecutar la consulta SQL para activar el evento
    $builder = $this->db->table('noticias');
    $builder->set('estadoEvento', 'Activo');
    $builder->where('id', $idEvento);
    $builder->update('noticias');
}

#Mostrar INDEX
public function mostrarIndex(){
    $builder = $this->db->table('noticias');
    $builder->select('noticias.*');
    return $builder->get()->getResultArray();
}
}