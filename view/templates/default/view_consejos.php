<?php
$noti = $data['consejos'];
?>
   
   <!-- Noticias-->    		
		<section class="noti2">
			<?php if ($noti): ?>
				<div class="font-titulo"><p><font><strong><?php echo $noti->getTitulo()?></strong></font></p></div>
				
				
					<div id="info-not">
					
							<div id="imag-not">	
							
							<?php foreach ($noti->getImgcons() as $imagen): ?>
								<img src="<?= $this->asset ?>system/upload/<?= $imagen->getImgcons() ?>" width="530" height="350" />
							<?php endforeach; ?>
							</div>	
						
								<article>
										<p><?php echo $noti->getDescripcion()?></p>
					
								</article>
					</div>			

						
			<?php else: ?>
                  <h3>Notícia no encontrada!</h3>
						<?php endif; ?>
                        <a href="<?php echo $this->base_url?>Consejos">Volver</a>
					
					
			
		</section>
        <!-- /Noticias -->    
		