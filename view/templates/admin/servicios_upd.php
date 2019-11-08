<?php
$servi = null;
$message = "Servicio no encontrado!!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['serv'])) {
        $servi = $data['serv'];
    }
}
?>
  <div style="margin:80px auto">

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Servicios</h1>
          <p>Nuevo servicio</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">AdminServicio</li>
          <li class="breadcrumb-item"><a href="#">Editar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="tile">
            <h3 class="tile-title">Servicios</h3>
            <div class="tile-body">
			   <?php if ($servi): ?>
              <form role="form"  method="post">
                <div class="form-group">
                  <label class="control-label">Servicio:</label>
                  <input class="form-control" placeholder="Servicio" name="servicio" value = "<?php echo $servi->getServicio();?>">
                </div>
              
                <div class="form-group">
                    <label class="control-label">Descripción:</label>
                    <textarea name="descripcion" class="form-control" rows="4" placeholder="Descripción" ><?php echo $servi->getDescripcion();?></textarea>
                </div>

               <input type="hidden" value="<?php echo $servi->getIdServicios() ?>" name="idServicios">
                               
			     <div class="form-group">
                                    <input name="edit" type="submit" class="btn btn-primary" value="Salvar">
                                    <input name="exit" type="submit" class="btn btn-danger" value="Cancelar">
                                </div>
				 <?php endif; ?>
                        <?php if ($message): ?>
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
              </form>
            </div>

          </div>
        </div>


        </div>
      
    </main>
        </div>