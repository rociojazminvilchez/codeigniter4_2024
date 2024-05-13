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
protected $allowedFields = ['titulo', 'descripcion','estado','categoria','img','usuario','estado_modificado','usuario_modificado']; //Van los campos de la tabla
/*Esta configurado para que de baja el registro pero no lo elimina completamente*/

// Dates - CHEQUEAR SI SIRVE PARA ESTE CASO
protected $useTimestamps = true; 
protected $dateFormat = 'datetime';
protected $createdField = 'fecha';
protected $updatedField = 'fecha_modificada';


}