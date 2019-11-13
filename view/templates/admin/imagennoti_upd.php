<?php
$imag = null;
$message = "Imagen no encontrada !!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['imag'])) {
        $imag = $data['imag'];
    }
}
?>
 <div style="margin:80px auto">

<main class="app-content">
 <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Imagenes</h1>
          <p>Editar Imagen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Imagen</li>
          <li class="breadcrumb-item"><a href="#">Editar</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="tile">
            <div class="tile-body">
		              
			<?php if ($imag): ?>

          <form class="row" method="post" enctype="multipart/form-data">
             <div class="form-group col-md-3">
              <label class="control-label">Nombre:</label>
              <input class="form-control" name="Nombre" placeholder="nombre"  value = "<?php echo $imag->getNombre();?>">
            </div>
           
            <div class="form-group row">
              <label class="control-label col-md-3">Selecionar imagen:</label>
              <div class="col-md-8">
                <input type="file" class="form-control" name="arquivo" id="arquivo" >
              </div>
            </div>

				<input type="hidden" value="<?php echo $imag->getIdImagen() ?>" name="idImagenNoti">
            <div class="form-group">
                <input name="edit" type="submit" class="btn btn-primary" value="Salvar">
                <input name="exit" type="submit" class="btn btn-danger" value="Cancelar">
            </div>
		  
		  </form>
		  
		    <?php endif; ?>
                        <?php if ($message): ?>
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $message; ?>
                                </div>
                            </div>
                        <?php endif; ?>
		  
        </div>
      </div>
    </div>

  </div>
</main>
</div>