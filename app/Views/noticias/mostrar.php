<?php echo $this->extend('plantilla\layout');?>

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
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
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
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
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
</p>

<h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> PANEL NOTICIAS </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Usuario</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($noticias as $not) : ?>
            <?php
              if(($_SESSION['rol'] =='Editor')){
                if(($_SESSION['usuario'] ==$not['usuario'])){
            ?>
            <tr>
              <td><?= $not['id']; ?></td>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= ucfirst($not['categoria']); ?></td>
              <td><?= $not['usuario']; ?></td>
              <td>
                <a href="<?php echo base_url('mostrar/' . $not['id']. '/historial'); ?>" class="btn btn-warning btn-sm me-2">HISTORIAL</a>
              </td>
            </tr>
        <?php }
              }
        else {
          ?>
          <tr>
          <td><?= $not['id']; ?></td>
          <td><?= $not['titulo']; ?></td>
          <td><?= $not['descripcion']; ?></td>
          <td><?= ucfirst($not['categoria']); ?></td>
          <td><?= $not['usuario']; ?></td>
          <td>
            <a href="<?php echo base_url('mostrar/' . $not['id']. '/historial'); ?>" class="btn btn-warning btn-sm me-2">HISTORIAL</a>
          </td>
        </tr>
        <?php
        }
              
            endforeach; 
        
      ?>

    </tbody>
</table><br><br><br><br>

<?= $this->endSection(); ?>