<?php 
namespace App\Models;
use CodeIgniter\Model;

class Mostrar extends Model{ 
 
   public function mostrarTodo(){
    $noticiasModel = new NoticiasModel();
    $resultado = $noticiasModel->findAll();
    $data = ['noticias' => $resultado];
    return $data;
   }
   
}
?>