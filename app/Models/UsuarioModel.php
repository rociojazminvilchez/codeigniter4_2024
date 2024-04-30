<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model{ 
    
protected $table = 'ingresousuario'; 
protected $primaryKey = 'correo';
protected $useAutoIncrement = false; 
protected $returnType = 'array'; //tambien se puede usar como object
protected $useSoftDeletes = false; //Como se comporta la eliminacion de registro
protected $allowedFields = ['contra', 'rol']; //Van los campos de la tabla
/*Esta configurado para que de baja el registro pero no lo elimina completamente*/

// Dates
protected $useTimestamps = false; 
protected $dateFormat = 'datetime';
protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
#protected $deletedField = 'deleted_at';
#protected $validationRules = []; // Validation
#protected $validationMessages = [];
#protected $skipValidation = false;
#protected $cleanValidationRules = true;

}