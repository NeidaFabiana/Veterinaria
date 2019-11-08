<?php
$cons = null;
$message = "Consulta no encontrada !!";
if ($data) {
    $message = $data['msg'];
    if (isset($data['consu'])) {
        $cons = $data['consu'];
    }
}
?>
  <div style="margin:80px auto">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administrar Consultas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Deletar Consulta
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        <?php if ($cons): ?>
                            <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  Deseas eliminar?
                                </div>
                        <form role="form"  method="post" action='<?php echo $this->url?>AdminConsultas/removerConsultas/'>
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <h2><?php echo $cons->getNombre();?></h2>
                                </div>
								
								<div class="form-group">
                                    <label>Fecha:</label>
                                    <h2><?php echo $cons->getFecha();?></h2>
                                </div>
								
								<div class="form-group">
                                    <label>Horario:</label>
                                    <h2><?php echo $cons->getHorario();?></h2>
                                </div>
								
								<div class="form-group">
                                    <label>Telefono:</label>
                                    <h2><?php echo $cons->getTelefono();?></h2>
                                </div>
								
                                <div class="form-group">
                                    <label>Direccion:</label>
                                    <p ><?php echo $cons->getDireccion();?></p>
                                </div>
								
                                <input type="hidden" value="<?php echo $cons->getIdConsultas() ?>" name="idConsultas">
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