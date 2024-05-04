<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
    <body>

    <?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

    <form class="form" action="<?= base_url('noticias'); ?>" method="POST" enctype="multipart/form-data">
    <p style="text-align:right;">
      <a href="<?php echo base_url('noticias')?>">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </a>
    </p>
    
      <p style="text-align:left;"><span class="error"> (*) Campos obligatorios</span></p>
      <h4 style="text-align:left;"> Informaci&oacuten de la noticia:</h4><br>

      <span class="error">*</span> T&iacute;tulo: <br>   
        <input type="text" name="titulo" required ><br><br>
        
      <span class="error">*</span> Descripci&oacute;n:<br>
        <input type="text" name="descripcion"   required><br><br>

        
      <span class="error">*</span> 
        Estado: <br>
          <select id="estado" name="estado">
            <option value="seleccione">Seleccione...</option>
            <option value="borrador">Borrador</option>
            <option value="validar">Lista para validar</option>
          </select><br><br>

      <span class="error">*</span>   
        Categor&iacute;a:<br>
          <select id="categoria" name="categoria">
            <option value="seleccione">Seleccione...</option>
            <option value="economia">Economia</option>
            <option value="politica">Politica</option>
            <option value="turismo">Turismo</option>
            <option value="deporte">Deporte</option>
          </select><br><br>

        Imagen:<br>  
          <input type="file" name="img" id='img' accept="image/jpeg,image/png"><br>

        <!-- Correo oculto-->
          <input type="hidden" name="Email" value="<?php ?>">


        <input type="submit" name="oferta" value="CREAR NOTICIA">
        </form>
       <?php
       
       ?>
    </body>
<?php echo $this->endSection();?>