<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<br>
<div class="container text-center">
  <div class="row">
    
    <div class="col">
      <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/borrador')?>" role="button">EDITAR</a>
    </div>
    <div class="col">
        <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/validar')?>" role="button">Historial</a>
    </div>
    <div class="col">
    <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/correcion')?>" role="button">Correci&oacuten</a>
    </div>
  </div>
</div>
<h3 class="my-3" id="titulo"> Editar - Noticias </h3> 

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

    <tbody>

        <?php foreach ($noticias as $not) : ?>

            <tr>
                <td><?= $not['titulo']; ?></td>
                <td><?= $not['descripcion']; ?></td>
                <td><?= $not['categoria']; ?></td>
                <td><?= $not['img']; ?></td>
            
                <td>
                    <a href="<?php echo base_url('noticias/' . $not['id']. '/edit'); ?>" class="btn btn-warning btn-sm me-2">EDITAR</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<?= $this->endSection(); ?>
