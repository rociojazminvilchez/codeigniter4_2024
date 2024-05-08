<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
<br>
<body>
<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<h3 class="my-3" id="titulo" style="font-weight: bold;text-align:center;"> Historial </h3> 

<table style="width: 100%;">
<tr>
  <td style="font-weight: bold;text-align:center; color:#3366cc;">
    
    <a href="<?php echo base_url('/editar'); ?>">Original</a>

  </td>

  <td style="font-weight: bold;text-align:center;  color:#3366cc;">
  <a href="<?php echo base_url('editar/' . '6');?>">Editada</a>
  </td>

  <td style="font-weight: bold;text-align:center;  color:#3366cc;">
  <a href="<?php echo base_url('/../categorias/economia')?>">Corregida</a>
  </td>

  <td style="font-weight: bold;text-align:center;  color:#3366cc;">
  <a href="<?php echo base_url('/../categorias/economia')?>">Publicada</a>
  </td>
</tr>
</table>




    </body>

</body>
<?= $this->endSection(); ?>