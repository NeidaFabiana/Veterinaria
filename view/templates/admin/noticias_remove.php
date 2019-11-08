<?php
$message = "Notícia no encontrada !!";
if ($data) {
    $message = $data['msg'];
}
?>
  <div style="margin:80px auto">


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administrar Notícias</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Eliminar Notícia
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php if ($message): ?>
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $message; ?>
                                </div>
                                <a href="<?php echo $this->url?>AdminNoticias" class="btn btn-primary">Volver</a>
                                    
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