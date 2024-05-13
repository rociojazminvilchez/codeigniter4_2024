<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
<br>
<p>
       
<div class="container text-center">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('/estado/borrador')?>" role="button">ACTUALIZAR</a>
    </div>
    <div class="col">
    </div>
  </div>
</div>

    </tbody>
</table><br><br><br><br>

<?= $this->endSection(); ?>