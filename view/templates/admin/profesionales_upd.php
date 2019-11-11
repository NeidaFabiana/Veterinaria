<?php
$profe = null;
$message = "Profesionales no encontrados !!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['prof'])) {
        $profe = $data['prof'];
    }
}
?>
  <div style="margin:80px auto">

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Profesionales</h1>
          <p>Nuevo profesional</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">AdminProfesional</li>
          <li class="breadcrumb-item"><a href="#">Editar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="tile">
            <h3 class="tile-title">Profesionales</h3>
            <div class="tile-body">
			   <?php if ($profe): ?>
              <form role="form"  method="post">
                <div class="form-group">
                  <label class="control-label">Nombre:</label>
                  <input class="form-control" placeholder="Nombre" name="nombre" value = "<?php echo $profe->getNombre();?>">
                </div>
              
                <div class="form-group">
                    <label class="control-label">Formacion:</label>
                    <textarea name="formacion" class="form-control" rows="4" placeholder="Formación" ><?php echo $profe->getFormacion();?></textarea>
                </div>

               <input type="hidden" value="<?php echo $profe->getIdProfesionales() ?>" name="idProfesionales">
                               
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