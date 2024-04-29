<?php
echo $this->extend('plantilla\layout');
?>

<?php 
echo $this->section('contenido');
?>

<h2> hola hola </h2>

<?php echo $this->endSection();
?>