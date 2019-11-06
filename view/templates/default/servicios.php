<?php
$list_serv = $data['listServ'];
?>	
			 <!-- Servicios-->    		
			<section class="servicios">
				<div class="font-titulo"><p><font><strong>Servicios</strong></font></p></div>
					<div class="font-sub"><p>En nuestro centro veterinario de atendemos las necesidades de tu mascota con profesionales y servicios especializados que garantizan un rápido diagnóstico y el tratamiento más adecuado para su salud.</p></div>
						
						<div id="servicios">
							<div class="container3">
							<?php if ($list_serv): ?>
	  
							<?php foreach($list_serv as $serv):?>
							
								<article>
										<div class="cont">
										
											<?php foreach ($serv->getImgserv() as $imagem): ?>
											<img src="<?php echo $this->asset."system/upload/".$imagem->getNombre()?>" width="100%" height="300"/>
											<?php endforeach;?>	
											
											<h2><a href="<?php echo $this->base_url?>News/viewNews/<?php echo $serv->getIdServicios()?>">
											<p><span><?php echo $serv->getServicio()?> </span></p></a></h2>
											<p><?php echo $serv->getDescripcion()?></p>								
										</div>
									</article>
									
									<article>
										<div class="cont1">		
											<?php foreach ($serv->getImgserv() as $imagem): ?>
											<img src="<?php echo $this->asset."system/upload/".$imagem->getNombre()?>" width="100%" height="300"/>
											<?php endforeach;?>	
											
											<h2><a href="<?php echo $this->base_url?>News/viewNews/<?php echo $serv->getIdServicios()?>">
											<p><span><?php echo $serv->getServicio()?> </span></p></a></h2>
											<p><?php echo $serv->getDescripcion()?></p>	
										</div>		
									</article>
									
								<?php endforeach;?>
								 <?php else:?>
									   <li>Não foram cadastradas notícias!</li>
								<?php endif; ?>
							</div>
						</div>	
						
						
						</div>	
	
			</section>
		<!-- /Servicios -->    
		