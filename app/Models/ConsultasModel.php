<?php 
namespace App\Models;
use CodeIgniter\Model;

class ConsultasModel extends Model{ 
 
   public function mostrarNoticias(){
      
      $builder = $this->db->table('noticias');
      $query   = $builder->get();
      /*
      $this->db->select('n1.* , e1.id');
      $this->db->from('noticias as n1');
      $this->db->join('editar as e1', 'n1.id = e2.id', 'inner');
      $query = $this->db->get();
      $result = $query->result();
      */
      return $query;

   }
   
}
?>