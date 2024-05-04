<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

    <body>
       <?php
            $emailError=$contraError="";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $Email = $_POST['Email'];
                $Contra = $_POST['Contra'];

                if($Email==""){
                    $emailError="Ingrese su correo electrónico.<br>";
                }

                if($Contra==""){
                    $contraError = "Ingrese su contraseña";
                }
            }
       ?>

      <form class="form" action="bd\BDusuario.php" method="POST">
        <p style="text-align:right;">
          <a href="<?php echo base_url('noticia')?>">
            <button type="button" class="btn-close" aria-label="Close">
            </button>
          </a>
        </p>
           <h2> Iniciar sesi&oacuten:</h2><br>

            E-mail:<br>    
                <input type="email" name="Email" > <br>
                <span class="error"> <?php echo $emailError; ?></span><br>

            Contrase&ntildea:<br>
               <input type="password" name="Contra"><br>
               <span class="error"> <?php echo $contraError; ?></span><br>

            <input type="submit" name="ingresar" value="Ingresar"><br><br>

            <a href="<?php echo base_url('noticias/recuperar_contra')?>"> ¿Olvidaste tu contrase&ntildea? </a>
        </form>
        <?php 
            //include("bd\BDusuarios.php");
        ?>
    </body>

<?php echo $this->endSection();?>