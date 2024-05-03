<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>


<h3 class="my-3" id="titulo">Noticias</h3>

<a href="<?= base_url('noticias/new'); ?>" class="btn btn-success">Agregar</a> 

<?php echo $this->endSection();?>