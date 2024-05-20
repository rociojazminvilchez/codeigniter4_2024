<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>
<br><br><br>
<form action="<?= base_url('editar/'. $not['id'].'/update2'); ?>" method="post" enctype="multipart/form-data" style="margin-bottom:75px;">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="estado_modificado" value="correccion">
<input type="hidden" name="estatus" value="1">
<input type="hidden" name="usuario_modificado" value="<?= $_SESSION['usuario']?>">
<p style="text-align: center;">
<button type="submit" name="actualizar" class="btn btn-sm btn-success" style="background-color: #3366cc;">ACTUALIZAR</button>
</p>
</form>
</body>

<?php echo $this->endSection();?>