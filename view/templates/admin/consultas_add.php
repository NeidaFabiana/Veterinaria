<?php
    $message = $data['msg'];
?>
 
	<div style="margin:80px auto">

		<main class="app-content">
		  <div class="app-title">
			<div>
			  <h1><i class="fa fa-edit"></i>Consultas</h1>
			  <p>Nueva consulta</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
			  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			  <li class="breadcrumb-item">Consulta</li>
			  <li class="breadcrumb-item"><a href="#">Adicionar</a></li>
			</ul>
		  </div>
		<div class="row">
			<div class="col-md-8 mx-auto">
			  <div class="tile">
				<h3 class="tile-title">Consulta</h3>
				<div class="tile-body">
				  <form role="form"  method="post">
					<div class="form-group">
					  <label class="control-label">Nombre:</label>
					  <input class="form-control" type="text" placeholder="Nombre" name="Nombre">
					</div>
					
					<div class="form-group">
					  <label class="control-label">Fecha:</label>
					  <input class="form-control" type="text" placeholder="Fecha" name="Fecha">
					</div>
					
					<div class="form-group">
					  <label class="control-label">Horario:</label>
					  <input class="form-control" type="text" placeholder="Horario" name="Horario">
					</div>
					
					<div class="form-group">
					  <label class="control-label">Telefono:</label>
					  <input class="form-control" type="text" placeholder="Telefono" name="Telefono">
					</div>
					
					<div class="form-group">
					  <label class="control-label">Dirección:</label>
					  <input class="form-control" type="text" placeholder="Direccion" name="Direccion">
					</div>
				  
				

					<div class="tile-footer">
						<input name="add" type="submit" class="btn btn-primary" value="Registrar">
						 &nbsp;&nbsp;&nbsp;
						 
						<a class="btn btn-secondary" href="<?php echo $this->url?>AdminConsultas"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
					</div>

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
	</div>
    </main>
