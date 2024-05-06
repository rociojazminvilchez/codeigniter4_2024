<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>

<br>
<?php foreach ($noticias as $not) : ?>
<div class="col-md-5">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $not['categoria']; ?></strong>
          <h3 class="mb-0"><?= $not['titulo']; ?></h3><br>
          <!--<div class="mb-1 text-body-secondary">Nov 12</div>-->
          <p class="card-text mb-auto"><?= $not['descripcion']; ?> </p>
          <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
            Ver m&aacute;s
            <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
          </a>
        
        <div class="col-auto d-none d-lg-block">
     
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Imagen</text></svg>
        </div>
      </div>
 </div>
</div>
<?php endforeach; ?>

</body>



<?php echo $this->endSection();?>