<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>
<br>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/borrador')?>" role="button">Borrador</a>
    </div>
    <div class="col">
        <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/validar')?>" role="button">Validar</a>
    </div>
    <div class="col">
    <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/correcion')?>" role="button">Correci&oacuten</a>
    </div>
  </div>
</div>
<br>
<h2> BORRADOR </h2>
<div class="container text-center">
  <button class="btn btn-primary me-md-2" type="button">Descartar</button>
  <button class="btn btn-primary" type="button">Anular</button>
</div>

</body>

<?php echo $this->endSection();?>