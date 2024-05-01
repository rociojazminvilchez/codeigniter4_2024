<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<body>
    <?php
       $emailError="";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Email = trim($_POST['Email']);

        if($Email==""){
            $emailError="Ingrese su correo electrónico.<br>";
        }

       }
    ?>
<form class="form" method="POST">
<p style="text-align:right;">
        <a href="<?php echo base_url('../index.php')?>">
          <button type="button" class="btn-close" aria-label="Close">
          </button>
        </a>
      </p>
    <h4 style="text-align:left;">Recuperar contrase&ntildea: </h4><br>
    <p> 
    Vamos a enviarte un e-mail para que puedas cambiar tu contrase&ntildea.
    </p><br>

    E-mail:<br>
    <input type="email" name="Email"><br>
    <span class="error"> <?php echo $emailError; ?></span>
    
    <input type="submit" name ="enviar" value="ENVIAR">
</form>
<?php
   # include("basedatos\BDrecuperarInicio.php");
?>

</body>

<?php echo $this->endSection();?>