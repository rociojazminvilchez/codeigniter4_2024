<div class="row">
      <form action="<?php echo base_url('corregir'); ?>" method="post" enctype="multipart/form-data" style="margin-bottom:75px;">
      
      <input type="hidden" name="id" value=" <?= $not['id']; ?>">
      <input type="hidden" name="usuario" value="<?= $not['usuario']; ?>">
      
      <input type="hidden" name="editor" value="<?=   $_SESSION['usuario']?>">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
          <div class="panel panel-success"><br>
            <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>EDITAR</font></center></h2>
            <div class="panel-body">
              <div class="row">  
                <div class="col-md-3 col-lg-3 " align="center"> 
				          <div id="load_img">
					          <img class="img-responsive" src=" <?= $not['id']; ?>" alt="Logo" width=100px height=100px>
                  
				          </div><br>				
					        
                  <div class="row">
  						      <div class="col-md-12">
							        <div class="form-group">
								        <input type="file" name="img">
							        </div>
						        </div>	
		              </div>
				       </div>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>
                            Usuario:</td>
                        <td><?= $not['usuario']; ?></td>
                      </tr>
                      
                      <tr>
                        <td>
                            Titulo:</td>
                            <td><input type="text" class="form-control input-sm" name="titulo" value="<?= $not['titulo']; ?>" required></td>
                      </tr>
                       
                      <tr>
                        <td>
                            Descripcion:</td>
                            <td><input type="text" class="form-control input-sm" name="descripcion" value="<?= $not['descripcion']; ?>" required></td>
                      </tr>
                      <tr>
                        <td>Categoria:</td>
                        <td><select id="categoria" name="categoria" >
                          <option value="seleccione"><?= ($not['categoria']); ?></option>
                          <option value="economia">Economia</option>
                          <option value="politica">Politica</option>
                          <option value="turismo">Turismo</option>
                          <option value="deporte">Deporte</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td>Estado:</td>
                        <td><select id="estado" name="estado" >
                          <option value="seleccione">Seleccione</option>
                          
                              <option value="borrador">Borrador</option>
                               <option value="validar">Lista para validar</option>
                        </select></td>
                      </tr>

                    </body>
                  </table>   
                </div>
				
                <div class='col-md-12' id="resultados_ajax"></div>
              </div>
            </div>
           <!-- GUARDAR --> 
            <div class="panel-footer text-center">          
                <button type="submit" name="editar" class="btn btn-sm btn-success" style="background-color: #3366cc;">GUARDAR CAMBIOS</button>
              <br><br>
              

            </div>
              
          </div>
        </div>
		</form>
</div>
</body>

<?php echo $this->endSection();?>