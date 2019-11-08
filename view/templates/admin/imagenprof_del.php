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

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administrar Imagenes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Deletar Imagen
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php if ($imag): ?>
                            <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  Deseas eliminar?
                                </div>
                        <form role="form"  method="post" action='<?php echo $this->url?>AdminProf/removeImagenProf/'>
                                <div class="form-group">
                                    <label>Nombre de la Imagen</label>
                                    <h2><?php echo $imag->getNombre();?></h2>
                                </div>
                               
                                <input type="hidden" value="<?php echo $imag->getIdImagen() ?>" name="idImagen">
                                <div class="form-group">
                                    <input name="del" type="submit" class="btn btn-danger" value="Deletar">
                                    <input name="exit" type="submit" class="btn btn-secondary" value="Cancelar">
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

    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->