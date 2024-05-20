<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
<br>
<body>

<?php             
    if ($_SESSION['rol'] =='Editor') {
            ?>
<!-- PERFIL EDITOR -->            
<div class="container text-center">
  <div class="row">
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/correcion')?>" role="button">CORRECI&OacuteN</a>
    </div>
  </div>
</div>
<?php
            }else if (isset($_SESSION['rol']) && ($_SESSION['rol'] =='Validador')){
 ?> 
 <!-- PERFIL VALIDADOR -->
 <div class="container text-center">
  <div class="row">
  <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/validar')?>" role="button">VALIDAR</a>
    </div>
  </div>
</div>
 <?php
            }else{
 ?>             
  <!-- PERFIL EDITOR | VALIDADOR  -->   
  <div class="container text-center">
  <div class="row">
  <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('noticias/mostrar')?>" role="button">HISTORIAL</a>
    </div>
    <div class="col">
      <a class="btn btn-primary" href="<?php echo base_url('/estado/editar')?>" role="button">EDITAR</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/correcion')?>" role="button">CORRECI&OacuteN</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="<?php echo base_url('/estado/validar')?>" role="button">VALIDAR</a>
    </div>
  </div>
</div>
<?php 
}
   ?> 
</p>
<h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> HISTORIAL </h3>  
<?php
  function modificar_fecha ($fecha_inicial){
  $fecha_modificada = date("d/m/Y", strtotime($fecha_inicial));
  return $fecha_modificada;
} 
$estado='';
$estadoValidar='';
$estadoEditar='';
$estadoEditar2='';
?>
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
<h5 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> CREACI&OacuteN:</h5>
<!--HISTORIAL-NOTICIAS-->
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>

    <tbody>
      <?php  
      foreach ($noticias as $not) : ?>
       <tr>
              <td><?= $not['id']; ?></td>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= ucfirst($not['estado']); ?></td>
              <td><?= ucfirst($not['categoria']); ?></td>
              <td>
                <?php if($not['img']!=''){ ?>
                  <img src="<?="uploads/".$not['img']; ?>" alt="Imagen" width="100" height="100">
                <?php
                  }
                ?>
              </td>
              <td><?= $not['usuario']; ?></td>
              <td>
              <?php 
                  $fecha_inicial=  $not['fecha']; 
                  $fecha = modificar_fecha($fecha_inicial);
                  echo $fecha; 
                ?>
              </td>

        </tr>
        <?php 
        $estado=$not['estado'];

      endforeach; ?>
    </tbody>
</table>


<?php
if($estado=='borrador'){
?>
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <h5 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> EDICI&OacuteN:</h5>
<!--HISTORIAL-EDITAR-->
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Fecha</th>
           
        </tr>
    </thead>
    <tbody>
      <?php  
      foreach ($editar as $not) : ?>

            <tr>
              <td><?= $not['id']; ?></td>
              <td><?=  ucfirst($not['titulo']); ?></td>
              <td><?=  ucfirst($not['descripcion']); ?></td>
              <td><?=  ucfirst($not['estado']); ?></td>
              <td><?=  ucfirst($not['categoria']); ?></td>
              <td>
                <?php if($not['img']!=''){ ?>
                  <img src="<?="uploads/".$not['img']; ?>" alt="Imagen" width="100" height="100">
                <?php
                  }
                ?>
              </td>
              <td>
              <?php 
                  $fecha_inicial=  $not['fecha']; 
                  $fecha = modificar_fecha($fecha_inicial);
                  echo $fecha; 
                ?>
              </td>
             
            </tr>
        <?php endforeach; 
        $estadoEditar=$not['estado'];
        ?>
    </tbody>
</table>
<?php
}
?>

<?php
  if($estado=='borrador' && $estadoEditar=='borrador'){
?>
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
<!--HISTORIAL-EDITAR 2-->
<h5 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> EDICI&OacuteN (2):</h5>
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
      <?php  
      foreach ($editar2 as $not) : ?>

            <tr>
              <td><?= $not['id']; ?></td>
              <td><?=  ucfirst($not['titulo']); ?></td>
              <td><?=  ucfirst($not['descripcion']); ?></td>
              <td><?=  ucfirst($not['estado']); ?></td>
              <td><?=  ucfirst($not['categoria']); ?></td>
              <td>
                <?php if($not['img']!=''){ ?>
                  <img src="<?="uploads/".$not['img']; ?>" alt="Imagen" width="100" height="100">
                <?php
                  }
                ?>
              </td>
              <td>
              <?php 
                  $fecha_inicial=  $not['fecha']; 
                  $fecha = modificar_fecha($fecha_inicial);
                  echo $fecha; 
                ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><br><br>
<?php
  }
?>

<!--HISTORIAL-VALIDACION-->
<?php
  if($estado=='validar' || $estadoEditar=='validar'){
?>
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
<h5 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> VALIDACI&OacuteN:</h5>
    <thead class="table-dark">
      <tr>
        <th scope="col">Estado</th>
        <th scope="col">Validador</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>

  <tbody>
    <?php  
      foreach ($editar as $not) : ?>
       <tr>
          <td><?= ucfirst($not['estado_modificado']); ?></td>
          <td><?= $not['usuario_modificado']; ?></td>
          <td><?php $fecha_inicial=  $not['fecha_modificada']; 
                $fecha = modificar_fecha($fecha_inicial);
                echo $fecha;  
          ?></td>
           <td><?= $not['estadoEvento']; ?></td>
        </tr>
        
<?php 
  $estadoValidar=$not['estado_modificado'];
  endforeach; 

?>
 <?php  
      foreach ($noticias as $not) : ?>
       <tr>
          <td><?= ucfirst($not['estado_modificado']); ?></td>
          <td><?= $not['usuario_modificado']; ?></td>
          <td><?php $fecha_inicial=  $not['fecha_modificada']; 
                $fecha = modificar_fecha($fecha_inicial);
                echo $fecha;  
          ?></td>
          <td><?= $not['estadoEvento']; ?></td>
        </tr>
        
<?php 
  $estadoValidar=$not['estado_modificado'];
  endforeach; 

?>
  </tbody>
</table>
<?php
  }
  ?>

<?php
if($estadoValidar=='correccion' ){
?>
<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
<h5 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> CORRECCI&OacuteN:</h5>
<!--HISTORIAL- CORRECCION-->
    <thead class="table-dark">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
      <?php  
      foreach ($correccion as $not) : 
      ?>
            <tr>
              <td><?= $not['titulo']; ?></td>
              <td><?= $not['descripcion']; ?></td>
              <td><?= ucfirst($not['estado']); ?></td>
              <td><?= ucfirst($not['categoria']); ?></td>
              <td>
                <?php if($not['img']!=''){ ?>
                  <img src="<?="uploads/".$not['img']; ?>" alt="Imagen" width="100" height="100">
                <?php
                  }
                ?>
              </td>
              <td><?php $fecha_inicial=  $not['fecha_modificada']; 
                $fecha = modificar_fecha($fecha_inicial);
                echo $fecha;  
          ?></td>
            </tr>
        <?php endforeach; 
        ?>
    </tbody>
</table>
<?php }
?> 
<br><br><br>
</body>
<?= $this->endSection(); ?>