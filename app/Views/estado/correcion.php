<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
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
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
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
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div> 
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
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/validar')?>" role="button">VALIDAR</a>
    </div>
  </div>
</div>
<?php 
}
   ?> 
</p>

<h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> PANEL EDITAR - CORRECI&OacuteN </h3> 


<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
    <?php if($_SESSION['rol']=='Editor'){
       foreach ($noticias as $not) : 
          if( $not['usuario'] == $_SESSION['usuario'] && ($not['estado_modificado']=='correccion')) {
        ?>
            <tr>
              <td><?= $not['id']; ?></td>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= $not['categoria']; ?></td>
              <td><?= $not['img']; ?></td>
            
              <td>                  
                <a href="<?php echo base_url('editar/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2"> CORREGIR</a>
              </td>
            </tr>
        <?php }
       endforeach; 
      }else if($_SESSION['rol']!='Editor'){
       foreach ($noticias as $not) : 
          if(($not['estado_modificado']=='correccion')) {
        ?>
            <tr>
              <td><?= $not['id']; ?></td>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= $not['categoria']; ?></td>
              <td><?= $not['img']; ?></td>
            
              <td>                  
                <a href="<?php echo base_url('editar/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2"> CORREGIR</a>
              </td>
            </tr>
        <?php }
       endforeach; 
       foreach ($editar as $not) : 
        if(($not['estado_modificado']=='correccion' &&  $not['estatus']='')) {
      ?>
          <tr>
            <td><?= $not['id']; ?></td>
            <td><?= $not['titulo']; ?></td>
            <td><?= $not['descripcion']; ?></td>
            <td><?= $not['categoria']; ?></td>
            <td><?= $not['img']; ?></td>
          
            <td>                  
              <a href="<?php echo base_url('editar/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2"> CORREGIR</a>
            </td>
          </tr>
      <?php }
     endforeach; 
      }
       ?>
    </tbody>
</table><br><br><br>

<?= $this->endSection(); ?>