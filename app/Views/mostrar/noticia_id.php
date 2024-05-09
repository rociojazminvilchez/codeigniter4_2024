<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?><div class="card text-center">
<br>
<body>
<?php foreach ($noticias as $not) :
echo($not['id']);
    ?>
  <div class="card-header" align="left">
  <?= $not['categoria']; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Tratamiento especial del título</h5>
    <p class="card-text">Con texto de apoyo a continuación como introducción natural a contenido adicional.</p>
    <a href="#" class="btn btn-primary">Ir a algún lugar</a>
  </div>
  <div class="card-footer text-muted">
    Hace 2 días
  </div>
</div>     
<?php endforeach; ?>   
    </body>
    <?php echo $this->endSection();?>