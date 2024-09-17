<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>

<br>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($noticias as $not) : 
            if($not['estadoEvento']=='Activo'){       
        ?>
    
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                <strong class="d-inline-block mb-2 text-primary-emphasis"><?= ucfirst($not['categoria']); ?></strong>
                    <h5 class="card-title" style="text-align: center;"><?= $not['titulo']; ?></h5>
                    <?php if($not['img']!=''){ ?>
                        <img src="<?= "uploads/".$not['img']; ?>" class="card-img-top" alt="Imagen"><br><br>
                    <?php } ?>
                    <p style="text-align: center;">
                    <a href="<?php echo base_url('mostrar/' . $not['id']. '/noticia_id'); ?>" class="btn btn-primary">Ver más información</a>
                    </p>
                  </div>
            </div>
        </div>
                    </td>
        <?php }
        endforeach; ?>

         <?php foreach ($editar as $not) : 
            if($not['estado_modificado']=='publicar' && $not['estadoEvento']=='Activo'){       
        ?>
    
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                <strong class="d-inline-block mb-2 text-primary-emphasis"><?= ucfirst($not['categoria']); ?></strong>
                    <h5 class="card-title" style="text-align: center;"><?= $not['titulo']; ?></h5>
                    <?php if($not['img']!=''){ ?>
                        <img src="<?= "uploads/".$not['img']; ?>" class="card-img-top" alt="Imagen"><br><br>
                    <?php } ?>
                    <p style="text-align: center;">
                    <a href="<?php echo base_url('mostrar/' . $not['id']. '/noticia_id'); ?>" class="btn btn-primary">Ver más información</a>
                    </p>
                  </div>
            </div>
        </div>
                    </td>
        <?php }
        endforeach; ?>
        
    </div>
</div>
<br><br><br><br>

</body>

<?php echo $this->endSection();?>