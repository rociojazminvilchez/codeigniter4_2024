<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>

<br>
<body>
<?php
  function dias_pasados($fecha_inicial,$fecha_final){
    $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
    $dias = abs($dias); $dias = floor($dias);
    
    return $dias;
}

function modificar_fecha ($fecha_inicial){
  $fecha_modificada = date("d/m/Y", strtotime($fecha_inicial));
  return $fecha_modificada;
}
?>
<br>
<body>

<div class="container text-center">
  <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
     
 <div class="card text-center">
    <div class="card-header" style = "text-align:right;">
  <?php 
    $fecha_inicial=  $not['fecha'];
    $fecha = modificar_fecha($fecha_inicial);
    echo $fecha; 
  ?>
  </div>
  <div class="card-header" style = "text-align:left; font-weight: bold;">
    <?php echo ucfirst($not['categoria']);  ?>
  </div>

  <div class="card-body">
    <h5 class="card-title"> <?php echo ucfirst($not['titulo']); ?> </h5>
    <div class="col-auto d-none d-lg-block" style = "text-align:center;">
    <img src="<?= "uploads/".$not['img']; ?>" alt="Imagen" width="250" height="250">
    </div><br>

    <p class="card-text"> <?php echo ucfirst($not['descripcion']); ?> </p>
  </div>
  <div class="card-footer text-muted">
  <?php 
  $fecha_inicial=  $not['fecha'];
  // fecha actual
  $fecha_final= date("Y/m/d");

$dias = dias_pasados($fecha_inicial,$fecha_final);
if($dias!=0){
  echo "Publicado hace ".$dias. " dias";
}else{
  echo("Recientemente publicado");
}

  ?>
  </div>
</div>   

    </div>
    <div class="col-2">
    </div>
  </div>
</div><br>
<br><br><br><br>
</body>    
<?php echo $this->endSection();?>