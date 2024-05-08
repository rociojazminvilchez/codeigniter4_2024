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
    <!--
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
    </div>
    -->
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/corregir')?>" role="button">CORRECI&OacuteN</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
  </div>
</div>
<?php 
}
   ?> 

<h3 class="my-3" id="titulo" align="center"> PANEL VALIDAR </h3> 
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col"></th>

        </tr>
    </thead>
 <?php foreach ($noticias as $not) : 
    if($not['estado']=='validar'){
    ?>
    
            <tr>
                <td><?= $not['titulo']; ?></td>
                <td><?= $not['descripcion']; ?></td>
                
                <td><?= $not['categoria']; ?></td>
                <td><?= $not['img']; ?></td>
                <td>
                    <a href="<?php echo base_url(''); ?>" class="btn btn-warning btn-sm me-2">PUBLICAR</a><br><br>
                    <a href="<?php echo base_url('corregir/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">CORREGIR</a> <br><br>
                    <a href="<?php echo base_url(''); ?>" class="btn btn-warning btn-sm me-2">RECHAZAR</a> <br><br>
                </td>
            </tr>
        <?php }
    endforeach; ?>

    </tbody>
</table>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    const eliminaModal = document.getElementById('eliminaModal')
    if (eliminaModal) {
        eliminaModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const url = button.getAttribute('data-bs-url')

            // Update the modal's content.
            const form = eliminaModal.querySelector('#form-elimina')
            form.setAttribute('action', url)
        })
    }
</script>
<?= $this->endSection(); ?>
