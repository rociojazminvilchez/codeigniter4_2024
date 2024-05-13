<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

    <body>
 
      <form class="form" action="<?php echo base_url('/noticias/login')?>" method="POST">
        <p style="text-align:right;">
          <a href="<?php echo base_url('noticia')?>">
            <button type="button" class="btn-close" aria-label="Close">
            </button>
          </a>
        </p>
           <h2> Iniciar sesi&oacuten:</h2><br>

            E-mail:<br>    
                <input type="email" name="usuario" required> <br>
                <span class="error"> </span><br>

            Contrase&ntildea:<br>
               <input type="password" name="contra" required><br>
               <span class="error"> </span><br>
               
            Seleccione su tipo de usuario: <br>
          <select id="tipo" name="tipo" required>
            <option value="Editor">Editor</option>
            <option value="Validador">Validador</option>
            <option value="Editor|Validador">Editor|Validador</option>
          </select><br><br>

            <input type="submit" name="ingresar" value="Ingresar"><br><br>

            <a href="<?php echo base_url('noticias/recuperar_contra')?>"> ¿Olvidaste tu contrase&ntildea? </a>
        </form>
 
    </body>

<?php echo $this->endSection();?>