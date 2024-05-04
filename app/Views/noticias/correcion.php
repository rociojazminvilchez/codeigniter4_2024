<?php echo $this->extend('plantilla\layout');?>

<?php echo $this->section('contenido');?>
<br>
<div class="container text-center">
  <div class="row">
    
    <div class="col">
      <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/borrador')?>" role="button">Borrador</a>
    </div>
    <div class="col">
        <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/validar')?>" role="button">Validar</a>
    </div>
    <div class="col">
    <a class="btn btn-outline-primary" href="<?php echo base_url('/panel/correcion')?>" role="button">Correci&oacuten</a>
    </div>
  </div>
</div>
<h3 class="my-3" id="titulo"> Historial - Noticias </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Usuario</th>
            <th scope="col"></th>

        </tr>
    </thead>

    <tbody>

        <?php foreach ($noticias as $not) : ?>

            <tr>
                <td><?= $not['id']; ?></td>
                <td><?= $not['titulo']; ?></td>
                <td><?= $not['descripcion']; ?></td>
                <td><?= $not['estado']; ?></td>
                <td><?= $not['categoria']; ?></td>
                <td><?= $not['img']; ?></td>
                <td><?= $not['usuario']; ?></td>
                <td>
                    <a href="" class="btn btn-warning btn-sm me-2">Borrador</a>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="">Validar</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <form id="form-elimina" action="" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    const eliminaModal = document.getElementById('eliminaModal')
    if (eliminaModal) {
        eliminaModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const url = button.getAttribute('data-bs-url')

            // Update the modal's content.
            const form = eliminaModal.querySelector('#form-elimina')
            form.setAttribute('action', url)
        })
    }
</script>

<?= $this->endSection(); ?>