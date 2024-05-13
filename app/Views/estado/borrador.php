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
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
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

<h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> PANEL BORRADOR </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Estado</th>

        </tr>
    </thead>

    <tbody>

        <?php foreach ($editar as $edit) : 
          if( $edit['usuario'] == $_SESSION['usuario'] && $edit['estado']=='borrador' && $edit['estado_modificado']=='') {
            
        ?>
            <tr>
                <td><?= $edit['titulo']; ?></td>
                <td><?= $edit['descripcion']; ?></td>
                <td><?= $edit['categoria']; ?></td>
                <td><?= $edit['img']; ?></td>
            
                <td>
                    <a href="<?php echo base_url('estado/' . $edit['id'].'/descartar'); ?>" class="btn btn-warning btn-sm me-2">DESCARTAR </a>
                </td>
            </tr>
        <?php }
       endforeach; ?>

    </tbody>
</table>

<?= $this->endSection(); ?>
