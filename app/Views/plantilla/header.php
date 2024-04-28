<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app\Views\css\index.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
  </script>

  <title>
    TECHNOLOGY
  </title>
</head>

<header>
<nav>
    <div class="grid-container" >
      <div class="grid-item" style="text-align: left;">
      <a href="index.php">
        <img alt="logo" src="logo.png">
      </a>
      </div>

  
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="¿Qu&eacute est&aacute;s buscando?" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">BUSCAR</button>
            </form>
        </div>
    </nav>

    <div class="grid-item" style="text-align: right; padding: 20px;">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
          </button>
        <ul class="dropdown-menu dropdown-menu-dark">
          <?php             
            if(isset($_SESSION['user'])){
              ?>
              <li><a class="dropdown-item"> <?php echo($_SESSION['user']) ?> </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="formularios\registroNoticia.php">Registrar noticia</a></li>
              <li><a class="dropdown-item" href="historial.php">Historial</a></li>
              <li><a class="dropdown-item" href="mostrar\perfil.php">Perfil </a></li>
              <li><a class="dropdown-item" href="cerrarsesion.php">Cerrar sesi&oacuten</a></li>
              <?php
            }else{
              ?>
            <li><a class="dropdown-item" href="formularios\registrarse.php">Registrarse</a></li>
            <li><a class="dropdown-item" href="formularios\iniciarsesion.php">Iniciar sesión</a></li>
            <!--
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="administrador\iniciar_admin.php">Administrador</a></li>
            -->
          <?php
          }
          ?>         
        </ul>
    </div>
  </div>
</nav>
</header>
