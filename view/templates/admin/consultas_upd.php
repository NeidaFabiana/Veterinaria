<?php
$cons = null;
$message = "Notícia no encontrada !!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['consu'])) {
        $cons = $data['consu'];
    }
}
?>
  <div style="margin:80px auto">

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Consultas</h1>
          <p>Nueva consulta</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">AdminConsultas</li>
          <li class="breadcrumb-item"><a href="#">Editar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="tile">
            <h3 class="tile-title">Consultas</h3>
            <div class="tile-body">
			   <?php if ($cons): ?>
              <form role="form"  method="post">
			 
                <div class="form-group">
                  <label class="control-label">Nombre:</label>
                  <input class="form-control" placeholder="Nombre" name="nombre" value = "<?php echo $cons->getNombre();?>">
                </div>
				
				<div class="form-group">
                  <label class="control-label">Fecha:</label>
                  <input class="form-control" placeholder="Fecha" name="fecha" value = "<?php echo $cons->getFecha();?>">
                </div>
				
				<div class="form-group">
                  <label class="control-label">Horario:</label>
                  <input class="form-control" placeholder="Horario" name="horario" value = "<?php echo $cons->getHorario();?>">
                </div>
				
				<div class="form-group">
                  <label class="control-label">Telefono:</label>
                  <input class="form-control" placeholder="Telefono" name="telefono" value = "<?php echo $cons->getTelefono();?>">
                </div>
				
				<div class="form-group">
                  <label class="control-label">Dirección:</label>
                  <input class="form-control" placeholder="Dirección" name="direccion" value = "<?php echo $cons->getDireccion();?>">
                </div>
              
                
               <input type="hidden" value="<?php echo $cons->getIdConsultas() ?>" name="idConsultas">
                               
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