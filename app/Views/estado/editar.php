<?php

use PharIo\Manifest\PhpElement;

 echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<br>
<p>
<?php             
    if ($_SESSION['rol'] =='Editor') {
?>
<!-- PERFIL EDITOR -->            
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/correcion')?>" role="button">CORRECI&OacuteN</a>
    </div>
  </div>
</div>
<?php
            }else if (isset($_SESSION['rol']) && ($_SESSION['rol'] =='Validador')){
 ?> 
 <!-- PERFIL VALIDADOR -->
 <div class="container text-center">
  <div class="row">
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/validar')?>" role="button">VALIDAR</a>
    </div>
  </div>
</div>
 <?php
            }else{
 ?>             
  <!-- PERFIL EDITOR | VALIDADOR  -->   
  <div class="container text-center">
  <div class="row">
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div> 
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/correcion')?>" role="button">CORRECI&OacuteN</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/validar')?>" role="button">VALIDAR</a>
    </div>
  </div>
</div>
<?php 
}
?> 

<h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> PANEL EDITAR -  BORRADOR </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Estado</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
    <?php if($_SESSION['rol']=='Editor' || $_SESSION['rol']=='Editor|Validador'){
      foreach ($noticias as $not) :  
            if( $not['usuario'] == $_SESSION['usuario'] && ($not['estado']=='borrador' && ($not['estado_borrador']!='descartado'))) {
            ?>
            <tr>
            <td><?= $not['id']; ?></td>
                <td><?= $not['estado']; ?></td>
                <td><?= $not['titulo']; ?></td>
                <td><?= $not['descripcion']; ?></td>
                <td><?= ucfirst($not['categoria']); ?></td>
                <td><?= $not['img']; ?></td>
            
                <td>                  
                    <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br> 
                    <a href="<?php echo base_url('estado/' . $not['id'].'/descartarNoticia'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
                </td>
            </tr>
          <?php
         }
       endforeach; 
       foreach ($editar as $not) :  
        if( $not['usuario'] == $_SESSION['usuario'] && ($not['estado']=='borrador') && ($not['estado_modificado']!='descartado')) {
        ?>
        <tr>
        <td><?= $not['id']; ?></td>
            <td><?= $not['estado']; ?></td>
            <td><?= $not['titulo']; ?></td>
            <td><?= $not['descripcion']; ?></td>
            <td><?= ucfirst($not['categoria']); ?></td>
            <td><?= $not['img']; ?></td>
        
            <td> 
              <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br>                  
              <a href="<?php echo base_url('estado/' . $not['id'].'/descartar'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
            </td>
        </tr>
      <?php
     }
   endforeach; 
   foreach ($editar2 as $not)  :  
    if( $not['usuario'] == $_SESSION['usuario'] && ($not['estado']=='borrador') && ($not['estado_borrador']!='descartado')) {
    ?>
    <tr>
    <td><?= $not['id']; ?></td>
        <td><?= $not['estado']; ?></td>
        <td><?= $not['titulo']; ?></td>
        <td><?= $not['descripcion']; ?></td>
        <td><?= ucfirst($not['categoria']); ?></td>
        <td><?= $not['img']; ?></td>
    
        <td>                  
            <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br> 
            <a href="<?php echo base_url('estado/' . $not['id'].'/descartarEdit2'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
        </td>
    </tr>
  <?php
 }
endforeach; 
  
      }else{
        foreach ($noticias as $not) :  
          if( $not['estado']=='borrador' && ($not['estado_borrador']!='descartado')){
          ?>
          <tr>
          <td><?= $not['id']; ?></td>
              <td><?= $not['estado']; ?></td>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= ucfirst($not['categoria']); ?></td>
              <td><?= $not['img']; ?></td>
          
              <td>                  
                  <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br> 
                  <a href="<?php echo base_url('estado/' . $not['id'].'/descartarNoticia'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
              </td>
          </tr>
        <?php
       }
     endforeach; 
     foreach ($editar as $not) :  
      if(  ($not['estado']=='borrador') && ($not['estado_modificado']!='descartado')) {
      ?>
      <tr>
      <td><?= $not['id']; ?></td>
          <td><?= $not['estado']; ?></td>
          <td><?= $not['titulo']; ?></td>
          <td><?= $not['descripcion']; ?></td>
          <td><?= ucfirst($not['categoria']); ?></td>
          <td><?= $not['img']; ?></td>
      
          <td> 
            <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br>                  
            <a href="<?php echo base_url('estado/' . $not['id'].'/descartar'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
          </td>
      </tr>
    <?php
   }
 endforeach; 
 foreach ($editar2 as $not)  :  
  if(($not['estado']=='borrador') && ($not['estado_borrador']!='descartado')) {
  ?>
  <tr>
  <td><?= $not['id']; ?></td>
      <td><?= $not['estado']; ?></td>
      <td><?= $not['titulo']; ?></td>
      <td><?= $not['descripcion']; ?></td>
      <td><?= ucfirst($not['categoria']); ?></td>
      <td><?= $not['img']; ?></td>
  
      <td>                  
          <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a><br><br> 
          <a href="<?php echo base_url('estado/' . $not['id'].'/descartarEdit2'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a> 
      </td>
  </tr>
<?php
}
endforeach; 
      }
       ?>
    </tbody>

</table><br><br><br>

<?= $this->endSection(); ?>

