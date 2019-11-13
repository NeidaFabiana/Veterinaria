<?php

$list_prof = $data['listProf'];


?>	
         <!-- Profesionales-->    		
			<section class="profesionales">
				<div class="font-titulo"><p><font><strong>Profesionales</strong></font></p></div>
					<div class="font-sub"><p>En Clínica Veterinaria Vida somos un equipo de profesionales entregadas, cuidadosas, cercanas y con una alta especialización para darte un servicio de calidad y la mejor experiencia.</p></div>

						<div id="formados">
							<div class="container2">
							
							<?php if ($list_prof): ?>
	  
								<?php foreach($list_prof as $prof):?>
								<article>
									<div id="imag1">
										 <?php foreach ($prof->getImgprof() as $imagen): ?>
										<img src="<?php echo $this->asset."system/upload/".$imagem->getImagen()?>" width="390" height="290"/>
										<?php endforeach;?>	
									</div>
								
									<div class="content2">	

										<h2><a href="<?php echo $this->base_url?>News/viewNews/<?php echo $prof->getIdProfesionales()?>">
										<p><span><?php echo $prof->getNombre()?></span></p></a></h2>
										
										<p><?php echo $prof->getDescripcion()?></p>		
									</div>		
								</article>
								<?php endforeach;?>
							<?php else:?>
								   <h3>No fueron registrados los profesionales!</h3>
							<?php endif; ?>
							</div>
						</div>	
					

						

						
	
			</section>
        <!-- /Profesionales-->    
		
   