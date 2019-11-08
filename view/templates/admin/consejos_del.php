<?php
$conse = null;
$message = "Consejos no encontrada !!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['cons'])) {
        $conse = $data['cons'];
    }
}
?>
  <div style="margin:80px auto">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administrar Consejos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Deletar Consejo
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php if ($conse): ?>
                            <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  Deseas eliminar?
                                </div>
                        <form role="form"  method="post" action='<?php echo $this->url?>AdminConsejos/removerConsejos/'>
                                <div class="form-group">
                                    <label>Título:</label>
                                    <h2><?php echo $conse->getTitulo();?></h2>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion:</label>
                                    <p ><?php echo $conse->getDescripcion();?></p>
                                </div>
                                <input type="hidden" value="<?php echo $conse->getIdConsejos() ?>" name="idConsejos">
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