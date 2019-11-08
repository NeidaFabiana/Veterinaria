<?php

    $message = $data['msg'];


?>
			 <div style="margin:80px auto">

			<main class="app-content">
			<div class="app-title">
					<div>
					  <h1><i class="fa fa-th-list"></i> Imagenes</h1>
					  <p></p>

					</div>
					<ul class="app-breadcrumb breadcrumb side">
					  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					  <li class="breadcrumb-item">Imagen</li>
					  <li class="breadcrumb-item active"><a href="#">Adicionar</a></li>
					</ul>
				  </div>
			  <div class="row">
			</br>
			</br>
				<div class="clearix"></div>
				<div class="col-md-12">
				  <div class="tile">
					<h3 class="tile-title">Nueva Imagen</h3>
					<div class="tile-body">
					  <form class="row" method="post" enctype="multipart/form-data">
					   
				

						<div class="form-group col-md-3">
						  <label class="control-label">Nombre:</label>
						  <input class="form-control" name="nombre" placeholder="Nombre...">
						</div>
						<div class="form-group row">
						  <label class="control-label col-md-3">selecionar imagen</label>
						  <div class="col-md-8">
							<input type="file" class="form-control" name="arquivo" id="arquivo">
						  </div>
						</div>

						<div class="form-group col-md-4 align-self-end">
						  <input type="submit" class="btn btn-default" value='create' name='add' >
						</div>
					  
					  
					<?php if ($message): ?>
						  <div class="alert alert-danger alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<?php echo $message; ?>
						  </div>
					  <?php endif ?>
					  
					  </form>
					</div>
				  </div>
				</div>

			  </div>
			</main>
			 </div>