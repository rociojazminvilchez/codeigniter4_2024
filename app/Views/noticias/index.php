<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>

<br>
<?php foreach ($noticias as $not) :  
  if($not['estado']=='borrador'){
?>

<div style = "text-align:center;">
<div class="col-md-4">
  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-2 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $not['categoria']; ?></strong>
      <h3 class="mb-0"><?= $not['titulo']; ?></h3><br>
  
    <div class="col-auto d-none d-lg-block" style = "text-align:center;">
      <svg class="bd-placeholder-img" width="150" height="150"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Imagen</text></svg>
    </div><br>
 
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('mostrar/' . $not['id']. '/noticia_id'); ?>" role="button">Ver m&aacutes informaci&oacuten</a>
    </div>

    </div>
  </div>
</div>
</div>

<?php }
endforeach; ?>

<br><br><br>
</body>

<?php echo $this->endSection();?>