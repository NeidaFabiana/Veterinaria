<?php
    $message = $data['msg'];
?>
 
	<div style="margin:80px auto">

		<main class="app-content">
		  <div class="app-title">
			<div>
			  <h1><i class="fa fa-edit"></i>Profesionales</h1>
			  <p>Nuevo Profesional</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
			  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			  <li class="breadcrumb-item">Profesional</li>
			  <li class="breadcrumb-item"><a href="#">Adicionar</a></li>
			</ul>
		  </div>
		<div class="row">
			<div class="col-md-8 mx-auto">
			  <div class="tile">
				<h3 class="tile-title">Profesional</h3>
				<div class="tile-body">
				  <form role="form"  method="post">
					<div class="form-group">
					  <label class="control-label">Nombre:</label>
					  <input class="form-control" type="text" placeholder="Nombre" name="Nombre">
					</div>
				  
					<div class="form-group">
						<label class="control-label">Formación:</label>
						<textarea name="Formacion" class="form-control" rows="4" placeholder="Formación" ></textarea>
					</div>

					<div class="tile-footer">
						<input name="add" type="submit" class="btn btn-primary" value="Registrar">
						 &nbsp;&nbsp;&nbsp;
						 
						<a class="btn btn-secondary" href="<?php echo $this->url?>AdminProfesionales"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
