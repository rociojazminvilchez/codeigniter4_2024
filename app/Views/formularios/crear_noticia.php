<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
    <body>

      <!-- CONTROLES -->
  <?php
      $tituloError=$descripcionError=$fechaError=$estadoError="";
      
     
     if ($_SERVER["REQUEST_METHOD"] == "POST") {     
        $Titulo = trim($_POST['titulo']);
        $Descripcion = trim($_POST['descripcion']);
    

    }
  ?>

<?php
/*
$sql2 = "SELECT * FROM registrousuario,registroalojamiento where registrousuario.correo= '$correo' and registroalojamiento.correo = '$correo'"; 
$resultado2 = mysqli_query($conexRapiBnB,$sql);
if ($resultado2!='cero' && $tipo_usuario=='Regular') {
    echo '<script type="text/javascript"> alert("En este momento no puede registrar un alojamiento"); </script>';
    //header ("location:index.php");	
  }else{
*/
?>
    <form class="form" action="bd\BDnoticias.php" method="POST" enctype="multipart/form-data">
    <p style="text-align:right;">
      <a href="<?php echo base_url('../index.php')?>">
        <button type="button" class="btn-close" aria-label="Close"></button>
      </a>
    </p>
    
      <p style="text-align:left;"><span class="error"> (*) Campos obligatorios</span></p>
      <h4 style="text-align:left;"> Informaci&oacuten de la noticia:</h4><br>
      
      <span class="error">*</span> T&iacute;tulo: <br>   
        <input type="text" name="titulo" required><br><br>
        
      <span class="error">*</span> Descripci&oacute;n:<br>
        <input type="text" name="descripcion" required><br><br>

        
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
          <input type="file" name="imagen" required><br>


        <input type="submit" name="oferta" value="CREAR NOTICIA">
        </form>
       <?php
       #}
       ?>
    </body>
<?php echo $this->endSection();?>